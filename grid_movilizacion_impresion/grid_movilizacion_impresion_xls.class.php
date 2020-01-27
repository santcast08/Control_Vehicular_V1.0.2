<?php

class grid_movilizacion_impresion_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Xls_dados;
   var $Xls_workbook;
   var $Xls_col;
   var $Xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $Arquivo;
   var $Tit_doc;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida']) {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xls_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($this->Arr_result);
              exit;
          }
          else
          {
              $this->monta_html();
          }
      }
      else { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $this->Xls_row = 1;
      $this->New_Xls_row = 1;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
      { 
          set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
          require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
          require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
          require_once $this->Ini->path_third . '/phpexcel/PHPExcel/Cell/AdvancedValueBinder.php';
      } 
      $orig_form_dt = strtoupper($_SESSION['scriptcase']['reg_conf']['date_format']);
      $this->SC_date_conf_region = "";
      for ($i = 0; $i < 8; $i++)
      {
          if ($i > 0 && substr($orig_form_dt, $i, 1) != substr($this->SC_date_conf_region, -1, 1)) {
              $this->SC_date_conf_region .= $_SESSION['scriptcase']['reg_conf']['date_sep'];
          }
          $this->SC_date_conf_region .= substr($orig_form_dt, $i, 1);
      }
      $this->Xls_tp = ".xlsx";
      if (isset($_POST['nmgp_tp_xls']) && !empty($_POST['nmgp_tp_xls']))
      {
          $this->Xls_tp = "." . $_POST['nmgp_tp_xls'];
      }
      $this->Xls_col      = 0;
      $this->Tem_xls_res  = false;
      $this->Xls_password = "";
      $this->nm_data      = new nm_data("es");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
      { 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_grid_movilizacion_impresion.zip";
          $this->Arquivo   .= "_grid_movilizacion_impresion" . $this->Xls_tp;
          $this->Tit_doc    = "grid_movilizacion_impresion" . $this->Xls_tp;
          $this->Tit_zip    = "grid_movilizacion_impresion.zip";
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );;
          $this->Xls_dados = new PHPExcel();
          $this->Xls_dados->setActiveSheetIndex(0);
          $this->Nm_ActiveSheet = $this->Xls_dados->getActiveSheet();
          if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
          {
              $this->Nm_ActiveSheet->setRightToLeft(true);
          }
      }
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function grava_arquivo()
   {
      global $nm_nada, $nm_lang;

      $GLOBALS["script_case_init"] = $this->Ini->sc_page;
      $pos      = strrpos($this->Ini->link_grid_detalle_movilizacion_reporte_cons_emb, '/');
      $link_xls = substr($this->Ini->link_grid_detalle_movilizacion_reporte_cons_emb, 0, $pos) . "/grid_detalle_movilizacion_reporte_xls.class.php";
      if (!is_file($this->Ini->link_grid_detalle_movilizacion_reporte_cons_emb) || !is_file($link_xls))
      {
          $this->NM_cmp_hidden['rutas'] = "off";
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = true;
          $_SESSION['scriptcase']['grid_detalle_movilizacion_reporte']['protect_modal'] = $this->Ini->sc_page;
          include_once ($this->Ini->link_grid_detalle_movilizacion_reporte_cons_emb);
          $this->grid_detalle_movilizacion_reporte = new grid_detalle_movilizacion_reporte_apl ;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = false;
          unset($_SESSION['scriptcase']['grid_detalle_movilizacion_reporte']['protect_modal']);
      }
      $pos      = strrpos($this->Ini->link_grid_detalle_movilizacion_reporte_cons_emb, '/');
      $link_xml = substr($this->Ini->link_grid_detalle_movilizacion_reporte_cons_emb, 0, $pos) . "/grid_detalle_movilizacion_reporte_xml.class.php";
      if (!is_file($this->Ini->link_grid_detalle_movilizacion_reporte_cons_emb) || !is_file($link_xml))
      {
          $this->NM_cmp_hidden['rutas'] = "off";
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = true;
          $_SESSION['scriptcase']['grid_detalle_movilizacion_reporte']['protect_modal'] = $this->Ini->sc_page;
          include_once ($this->Ini->link_grid_detalle_movilizacion_reporte_cons_emb);
          $this->grid_detalle_movilizacion_reporte = new grid_detalle_movilizacion_reporte_apl ;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = false;
          unset($_SESSION['scriptcase']['grid_detalle_movilizacion_reporte']['protect_modal']);
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_movilizacion_impresion']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_movilizacion_impresion']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_movilizacion_impresion']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['where_pesq_filtro'];
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();
      $this->count_span = 0;

      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['idusuario'])) ? $this->New_label['idusuario'] : "Conductor"; 
          if ($Cada_col == "idusuario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['movilizacion_funcionario'])) ? $this->New_label['movilizacion_funcionario'] : "Funcionario"; 
          if ($Cada_col == "movilizacion_funcionario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['movilizacion_fecha'])) ? $this->New_label['movilizacion_fecha'] : "Fecha de Movilización"; 
          if ($Cada_col == "movilizacion_fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['movilizacion_km_salida'])) ? $this->New_label['movilizacion_km_salida'] : "Kilometraje de Salida"; 
          if ($Cada_col == "movilizacion_km_salida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['movilizacion_km_llegada'])) ? $this->New_label['movilizacion_km_llegada'] : "Kilometraje de Llegada"; 
          if ($Cada_col == "movilizacion_km_llegada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['movilizacion_recorrido_vehiculo'])) ? $this->New_label['movilizacion_recorrido_vehiculo'] : "Kilometraje Recorrido por Vehiculo"; 
          if ($Cada_col == "movilizacion_recorrido_vehiculo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['rutas'])) ? $this->New_label['rutas'] : "Rutas Efectuadas"; 
          if ($Cada_col == "rutas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->arr_span['rutas'] = $this->count_span;
              $this->Emb_label_cols_rutas = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida_label'] = true;
              $GLOBALS["script_case_init"] = $this->Ini->sc_page;
              $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?";
              if (method_exists($this->grid_detalle_movilizacion_reporte, "controle"))
              {
                  $this->grid_detalle_movilizacion_reporte->controle();
                  if (isset($_SESSION['scriptcase']['export_return']))
                  {
                     foreach ($_SESSION['scriptcase']['export_return']['label'] as $col => $dados)
                     {
                         if (isset($dados['col_span_i'])) {
                             $this->Emb_label_cols_rutas += $dados['col_span_i'];
                         }
                         elseif (isset($dados['col_span_f'])) {
                             $this->Emb_label_cols_rutas += $dados['col_span_f'];
                         }
                         else {
                             $this->Emb_label_cols_rutas++;
                         }
                     }
                  }
                  $this->count_span += $this->Emb_label_cols_rutas;
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = false;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida_label'] = false;
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  foreach ($_SESSION['scriptcase']['export_return']['label'] as $col => $dados)
                  { 
                      $this->arr_export['label'][$this->Xls_col] = $dados;
                      $this->Xls_col++;
                  }
              }
              else
              { 
                 $this->xls_sub_cons_label($_SESSION['scriptcase']['export_return']['label']);
              }
          }
          $SC_Label = (isset($this->New_label['id_movilizacion'])) ? $this->New_label['id_movilizacion'] : "Id Movilizacion"; 
          if ($Cada_col == "id_movilizacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['movilizacion_ruta'])) ? $this->New_label['movilizacion_ruta'] : "Movilizacion Ruta"; 
          if ($Cada_col == "movilizacion_ruta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['movilizacion_hora_salida'])) ? $this->New_label['movilizacion_hora_salida'] : "Movilizacion Hora Salida"; 
          if ($Cada_col == "movilizacion_hora_salida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['movilizacion_hora_llegada'])) ? $this->New_label['movilizacion_hora_llegada'] : "Movilizacion Hora Llegada"; 
          if ($Cada_col == "movilizacion_hora_llegada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida_label'])
      { 
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->id_movilizacion = $Busca_temp['id_movilizacion']; 
          $tmp_pos = strpos($this->id_movilizacion, "##@@");
          if ($tmp_pos !== false && !is_array($this->id_movilizacion))
          {
              $this->id_movilizacion = substr($this->id_movilizacion, 0, $tmp_pos);
          }
          $this->movilizacion_funcionario = $Busca_temp['movilizacion_funcionario']; 
          $tmp_pos = strpos($this->movilizacion_funcionario, "##@@");
          if ($tmp_pos !== false && !is_array($this->movilizacion_funcionario))
          {
              $this->movilizacion_funcionario = substr($this->movilizacion_funcionario, 0, $tmp_pos);
          }
          $this->movilizacion_fecha = $Busca_temp['movilizacion_fecha']; 
          $tmp_pos = strpos($this->movilizacion_fecha, "##@@");
          if ($tmp_pos !== false && !is_array($this->movilizacion_fecha))
          {
              $this->movilizacion_fecha = substr($this->movilizacion_fecha, 0, $tmp_pos);
          }
          $this->movilizacion_fecha_2 = $Busca_temp['movilizacion_fecha_input_2']; 
          $this->movilizacion_ruta = $Busca_temp['movilizacion_ruta']; 
          $tmp_pos = strpos($this->movilizacion_ruta, "##@@");
          if ($tmp_pos !== false && !is_array($this->movilizacion_ruta))
          {
              $this->movilizacion_ruta = substr($this->movilizacion_ruta, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idusuario, movilizacion_funcionario, str_replace (convert(char(10),Movilizacion_Fecha,102), '.', '-') + ' ' + convert(char(8),Movilizacion_Fecha,20), Movilizacion_Km_Salida, Movilizacion_Km_Llegada, movilizacion_Recorrido_Vehiculo, Id_Movilizacion, Movilizacion_Ruta, str_replace (convert(char(10),Movilizacion_Hora_Salida,102), '.', '-') + ' ' + convert(char(8),Movilizacion_Hora_Salida,20), str_replace (convert(char(10),Movilizacion_Hora_Llegada,102), '.', '-') + ' ' + convert(char(8),Movilizacion_Hora_Llegada,20) from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, movilizacion_Recorrido_Vehiculo, Id_Movilizacion, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT idusuario, movilizacion_funcionario, convert(char(23),Movilizacion_Fecha,121), Movilizacion_Km_Salida, Movilizacion_Km_Llegada, movilizacion_Recorrido_Vehiculo, Id_Movilizacion, Movilizacion_Ruta, convert(char(23),Movilizacion_Hora_Salida,121), convert(char(23),Movilizacion_Hora_Llegada,121) from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, movilizacion_Recorrido_Vehiculo, Id_Movilizacion, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idusuario, movilizacion_funcionario, EXTEND(Movilizacion_Fecha, YEAR TO DAY), Movilizacion_Km_Salida, Movilizacion_Km_Llegada, movilizacion_Recorrido_Vehiculo, Id_Movilizacion, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, movilizacion_Recorrido_Vehiculo, Id_Movilizacion, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $this->New_Xls_row = $this->Xls_row;
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $this->Xls_col = 0;
         if ($this->New_Xls_row > $this->Xls_row) {
             $this->Xls_row = $this->New_Xls_row;
         }
         $this->Xls_row++;
         $this->idusuario = $rs->fields[0] ;  
         $this->idusuario = (string)$this->idusuario;
         $this->movilizacion_funcionario = $rs->fields[1] ;  
         $this->movilizacion_fecha = $rs->fields[2] ;  
         $this->movilizacion_km_salida = $rs->fields[3] ;  
         $this->movilizacion_km_salida = (strpos(strtolower($this->movilizacion_km_salida), "e")) ? (float)$this->movilizacion_km_salida : $this->movilizacion_km_salida; 
         $this->movilizacion_km_salida = (string)$this->movilizacion_km_salida;
         $this->movilizacion_km_llegada = $rs->fields[4] ;  
         $this->movilizacion_km_llegada = (strpos(strtolower($this->movilizacion_km_llegada), "e")) ? (float)$this->movilizacion_km_llegada : $this->movilizacion_km_llegada; 
         $this->movilizacion_km_llegada = (string)$this->movilizacion_km_llegada;
         $this->movilizacion_recorrido_vehiculo = $rs->fields[5] ;  
         $this->movilizacion_recorrido_vehiculo = (strpos(strtolower($this->movilizacion_recorrido_vehiculo), "e")) ? (float)$this->movilizacion_recorrido_vehiculo : $this->movilizacion_recorrido_vehiculo; 
         $this->movilizacion_recorrido_vehiculo = (string)$this->movilizacion_recorrido_vehiculo;
         $this->id_movilizacion = $rs->fields[6] ;  
         $this->id_movilizacion = (string)$this->id_movilizacion;
         $this->movilizacion_ruta = $rs->fields[7] ;  
         $this->movilizacion_hora_salida = $rs->fields[8] ;  
         $this->movilizacion_hora_llegada = $rs->fields[9] ;  
         $this->Orig_idusuario = $this->idusuario;
         $this->Orig_movilizacion_funcionario = $this->movilizacion_funcionario;
         $this->Orig_movilizacion_fecha = $this->movilizacion_fecha;
         $this->Orig_movilizacion_km_salida = $this->movilizacion_km_salida;
         $this->Orig_movilizacion_km_llegada = $this->movilizacion_km_llegada;
         $this->Orig_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
         $this->Orig_id_movilizacion = $this->id_movilizacion;
         $this->Orig_movilizacion_ruta = $this->movilizacion_ruta;
         $this->Orig_movilizacion_hora_salida = $this->movilizacion_hora_salida;
         $this->Orig_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
         //----- lookup - idusuario
         $this->look_idusuario = $this->idusuario; 
         $this->Lookup->lookup_idusuario($this->look_idusuario, $this->idusuario) ; 
         $this->look_idusuario = ($this->look_idusuario == "&nbsp;") ? "" : $this->look_idusuario; 
         //----- lookup - movilizacion_funcionario
         $this->look_movilizacion_funcionario = $this->movilizacion_funcionario; 
         $this->Lookup->lookup_movilizacion_funcionario($this->look_movilizacion_funcionario, $this->movilizacion_funcionario) ; 
         $this->look_movilizacion_funcionario = ($this->look_movilizacion_funcionario == "&nbsp;") ? "" : $this->look_movilizacion_funcionario; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
                { 
                    $NM_func_exp = "NM_sub_cons_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
                else 
                { 
                    $NM_func_exp = "NM_export_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
            } 
         } 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['field_order'] as $Cada_col)
         { 
            if ($Cada_col == "rutas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
            { 
                $xls_row_base = $this->Xls_row;
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
                { 
                    foreach ($this->Rows_sub_rutas as $line => $cols)
                    {
                        $this->Xls_row++;
                        $this->arr_export['lines'][$this->Xls_row] = $cols;
                    }
                    if (!empty($this->Rows_sub_rutas['lines']))
                    {
                        foreach ($cols as $col => $dados)
                        {
                            $cols[$col]['row_span_f'] = $xls_row_base - $this->Xls_row;
                             break;
                        }
                        $this->arr_export['lines'][$this->Xls_row] = $cols;
                    }
                }
                else 
                { 
                    foreach ($this->Rows_sub_rutas as $lines)
                    {
                        $this->Xls_col = 0;
                        $this->Xls_row++;
                        $this->xls_sub_cons_lines($lines);
                    }
                    $this->Xls_row = $xls_row_base;
                }
            } 
         } 
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['embutida'])
      { 
          if ($this->Xls_tp == ".xlsx")
          { 
              $objWriter = new PHPExcel_Writer_Excel2007($this->Xls_dados);
          } 
          else 
          { 
              $objWriter = new PHPExcel_Writer_Excel5($this->Xls_dados);
          } 
          $objWriter->save($this->Xls_f);
      } 
      else 
      { 
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
      if (method_exists($this->grid_detalle_movilizacion_reporte, "close_emb")) 
      {
          $this->grid_detalle_movilizacion_reporte->close_emb();
      }
   }
   //----- idusuario
   function NM_export_idusuario()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!NM_is_utf8($this->look_idusuario))
         {
             $this->look_idusuario = sc_convert_encoding($this->look_idusuario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->look_idusuario))
         {
             $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode('###0');
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->look_idusuario);
         $this->Xls_col++;
   }
   //----- movilizacion_funcionario
   function NM_export_movilizacion_funcionario()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         $this->look_movilizacion_funcionario = html_entity_decode($this->look_movilizacion_funcionario, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_movilizacion_funcionario = strip_tags($this->look_movilizacion_funcionario);
         if (!NM_is_utf8($this->look_movilizacion_funcionario))
         {
             $this->look_movilizacion_funcionario = sc_convert_encoding($this->look_movilizacion_funcionario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_movilizacion_funcionario, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- movilizacion_fecha
   function NM_export_movilizacion_fecha()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         $this->movilizacion_fecha = substr($this->movilizacion_fecha, 0, 10);
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         if (empty($this->movilizacion_fecha) || $this->movilizacion_fecha == "0000-00-00")
         {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->movilizacion_fecha, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         else
         {
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->movilizacion_fecha);
             $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($this->SC_date_conf_region);
         }
         $this->Xls_col++;
   }
   //----- movilizacion_km_salida
   function NM_export_movilizacion_km_salida()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!NM_is_utf8($this->movilizacion_km_salida))
         {
             $this->movilizacion_km_salida = sc_convert_encoding($this->movilizacion_km_salida, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->movilizacion_km_salida))
         {
             $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode('###0');
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->movilizacion_km_salida);
         $this->Xls_col++;
   }
   //----- movilizacion_km_llegada
   function NM_export_movilizacion_km_llegada()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!NM_is_utf8($this->movilizacion_km_llegada))
         {
             $this->movilizacion_km_llegada = sc_convert_encoding($this->movilizacion_km_llegada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->movilizacion_km_llegada))
         {
             $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode('###0');
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->movilizacion_km_llegada);
         $this->Xls_col++;
   }
   //----- movilizacion_recorrido_vehiculo
   function NM_export_movilizacion_recorrido_vehiculo()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!NM_is_utf8($this->movilizacion_recorrido_vehiculo))
         {
             $this->movilizacion_recorrido_vehiculo = sc_convert_encoding($this->movilizacion_recorrido_vehiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->movilizacion_recorrido_vehiculo))
         {
             $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode('###0');
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->movilizacion_recorrido_vehiculo);
         $this->Xls_col++;
   }
   //----- rutas
   function NM_export_rutas()
   {
         $GLOBALS["script_case_init"] = $this->Ini->sc_page;
         $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?id_movilizacion?#?" . str_replace("'", "@aspass@", $this->Orig_id_movilizacion) . "?@?";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = true;
         if (method_exists($this->grid_detalle_movilizacion_reporte, "controle"))
         {
             $this->grid_detalle_movilizacion_reporte->controle();
             if (isset($_SESSION['scriptcase']['export_return']))
             {
                 $prim_row = true;
                 $this->Rows_sub_rutas = array();
                 $this->Temp_Prim_Row = array();
                 if (isset($_SESSION['scriptcase']['export_return']['lines']))
                 {
                     foreach ($_SESSION['scriptcase']['export_return']['lines'] as $line => $cols)
                     {
                         $prim_col = true;
                         if ($prim_row)
                         {
                             $this->Temp_Prim_Row = $_SESSION['scriptcase']['export_return']['lines'][$line];
                             $prim_row = false;
                         }
                         else
                         {
                             foreach ($cols as $icol => $dados)
                             {
                                 $this->Rows_sub_rutas[$line][$icol] = $dados;
                                 if ($prim_col)
                                 {
                                     if (isset($this->Rows_sub_rutas[$line][$icol]['col_span_i']))
                                     {
                                        $this->Rows_sub_rutas[$line][$icol]['col_span_i'] += $this->arr_span['rutas'];
                                     }
                                     else
                                     {
                                        $this->Rows_sub_rutas[$line][$icol]['col_span_i'] = $this->arr_span['rutas'];
                                     }
                                     $prim_col = false;
                                 }
                             }
                         }
                     }
                     $this->xls_sub_cons_lines($this->Temp_Prim_Row);
                 }
             }
         }
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = false;
   }
   //----- id_movilizacion
   function NM_export_id_movilizacion()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!NM_is_utf8($this->id_movilizacion))
         {
             $this->id_movilizacion = sc_convert_encoding($this->id_movilizacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
         if (is_numeric($this->id_movilizacion))
         {
             $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode('###0');
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->id_movilizacion);
         $this->Xls_col++;
   }
   //----- movilizacion_ruta
   function NM_export_movilizacion_ruta()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         $this->movilizacion_ruta = html_entity_decode($this->movilizacion_ruta, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->movilizacion_ruta = strip_tags($this->movilizacion_ruta);
         if (!NM_is_utf8($this->movilizacion_ruta))
         {
             $this->movilizacion_ruta = sc_convert_encoding($this->movilizacion_ruta, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->movilizacion_ruta, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- movilizacion_hora_salida
   function NM_export_movilizacion_hora_salida()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
      if (!empty($this->movilizacion_hora_salida))
      {
         $conteudo_x =  $this->movilizacion_hora_salida;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->movilizacion_hora_salida, "HH:II:SS  ");
             $this->movilizacion_hora_salida = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->movilizacion_hora_salida))
         {
             $this->movilizacion_hora_salida = sc_convert_encoding($this->movilizacion_hora_salida, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->movilizacion_hora_salida, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- movilizacion_hora_llegada
   function NM_export_movilizacion_hora_llegada()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
      if (!empty($this->movilizacion_hora_llegada))
      {
         $conteudo_x =  $this->movilizacion_hora_llegada;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->movilizacion_hora_llegada, "HH:II:SS  ");
             $this->movilizacion_hora_llegada = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->movilizacion_hora_llegada))
         {
             $this->movilizacion_hora_llegada = sc_convert_encoding($this->movilizacion_hora_llegada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
         $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->movilizacion_hora_llegada, PHPExcel_Cell_DataType::TYPE_STRING);
         $this->Xls_col++;
   }
   //----- idusuario
   function NM_sub_cons_idusuario()
   {
         if (!NM_is_utf8($this->look_idusuario))
         {
             $this->look_idusuario = sc_convert_encoding($this->look_idusuario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_idusuario;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "###0";
         $this->Xls_col++;
   }
   //----- movilizacion_funcionario
   function NM_sub_cons_movilizacion_funcionario()
   {
         $this->look_movilizacion_funcionario = html_entity_decode($this->look_movilizacion_funcionario, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_movilizacion_funcionario = strip_tags($this->look_movilizacion_funcionario);
         if (!NM_is_utf8($this->look_movilizacion_funcionario))
         {
             $this->look_movilizacion_funcionario = sc_convert_encoding($this->look_movilizacion_funcionario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_movilizacion_funcionario;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- movilizacion_fecha
   function NM_sub_cons_movilizacion_fecha()
   {
         $this->movilizacion_fecha = substr($this->movilizacion_fecha, 0, 10);
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->movilizacion_fecha;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "data";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $this->SC_date_conf_region;
         $this->Xls_col++;
   }
   //----- movilizacion_km_salida
   function NM_sub_cons_movilizacion_km_salida()
   {
         if (!NM_is_utf8($this->movilizacion_km_salida))
         {
             $this->movilizacion_km_salida = sc_convert_encoding($this->movilizacion_km_salida, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->movilizacion_km_salida;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "###0";
         $this->Xls_col++;
   }
   //----- movilizacion_km_llegada
   function NM_sub_cons_movilizacion_km_llegada()
   {
         if (!NM_is_utf8($this->movilizacion_km_llegada))
         {
             $this->movilizacion_km_llegada = sc_convert_encoding($this->movilizacion_km_llegada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->movilizacion_km_llegada;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "###0";
         $this->Xls_col++;
   }
   //----- movilizacion_recorrido_vehiculo
   function NM_sub_cons_movilizacion_recorrido_vehiculo()
   {
         if (!NM_is_utf8($this->movilizacion_recorrido_vehiculo))
         {
             $this->movilizacion_recorrido_vehiculo = sc_convert_encoding($this->movilizacion_recorrido_vehiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->movilizacion_recorrido_vehiculo;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "###0";
         $this->Xls_col++;
   }
   //----- rutas
   function NM_sub_cons_rutas()
   {
         $this->Rows_sub_rutas = array();
         $GLOBALS["script_case_init"] = $this->Ini->sc_page;
         $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?id_movilizacion?#?" . str_replace("'", "@aspass@", $this->Orig_id_movilizacion) . "?@?";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = true;
         if (method_exists($this->grid_detalle_movilizacion_reporte, "controle"))
         {
             $this->grid_detalle_movilizacion_reporte->controle();
             if (isset($_SESSION['scriptcase']['export_return']))
             {
                 $this->row_sub = 1;
                 if (isset($_SESSION['scriptcase']['export_return']['lines']))
                 {
                     $xls_col_base = $this->Xls_col;
                     foreach ($_SESSION['scriptcase']['export_return']['lines'] as $line => $cols)
                     {
                         $this->Xls_col = $xls_col_base;
                         $prim_col = true;
                         foreach ($cols as $icol => $dados)
                         {
                             if ($this->row_sub == 1)
                             {
                                 $this->arr_export['lines'][$this->Xls_row][$this->Xls_col] = $dados;
                             }
                             else
                             {
                                 $this->Rows_sub_rutas[$this->row_sub][$icol] = $dados;
                             }
                             if ($prim_col && $this->row_sub > 1)
                             {
                                 if (isset($this->Rows_sub_rutas[$this->row_sub][$icol]['col_span_i']))
                                 {
                                    $this->Rows_sub_rutas[$this->row_sub][$icol]['col_span_i'] += $this->arr_span['rutas'];
                                 }
                                 else
                                 {
                                    $this->Rows_sub_rutas[$this->row_sub][$icol]['col_span_i'] = $this->arr_span['rutas'];
                                 }
                                $prim_col = false;
                             }
                             $this->Xls_col++;
                         }
                         $this->row_sub++;
                     }
                 }
             }
             else
             {
                 $this->Xls_col++;
             }
         }
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['embutida'] = false;
         $this->Xls_col++;
   }
   //----- id_movilizacion
   function NM_sub_cons_id_movilizacion()
   {
         if (!NM_is_utf8($this->id_movilizacion))
         {
             $this->id_movilizacion = sc_convert_encoding($this->id_movilizacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->id_movilizacion;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "###0";
         $this->Xls_col++;
   }
   //----- movilizacion_ruta
   function NM_sub_cons_movilizacion_ruta()
   {
         $this->movilizacion_ruta = html_entity_decode($this->movilizacion_ruta, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->movilizacion_ruta = strip_tags($this->movilizacion_ruta);
         if (!NM_is_utf8($this->movilizacion_ruta))
         {
             $this->movilizacion_ruta = sc_convert_encoding($this->movilizacion_ruta, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->movilizacion_ruta;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- movilizacion_hora_salida
   function NM_sub_cons_movilizacion_hora_salida()
   {
      if (!empty($this->movilizacion_hora_salida))
      {
         $conteudo_x =  $this->movilizacion_hora_salida;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->movilizacion_hora_salida, "HH:II:SS  ");
             $this->movilizacion_hora_salida = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->movilizacion_hora_salida))
         {
             $this->movilizacion_hora_salida = sc_convert_encoding($this->movilizacion_hora_salida, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->movilizacion_hora_salida;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- movilizacion_hora_llegada
   function NM_sub_cons_movilizacion_hora_llegada()
   {
      if (!empty($this->movilizacion_hora_llegada))
      {
         $conteudo_x =  $this->movilizacion_hora_llegada;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->movilizacion_hora_llegada, "HH:II:SS  ");
             $this->movilizacion_hora_llegada = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->movilizacion_hora_llegada))
         {
             $this->movilizacion_hora_llegada = sc_convert_encoding($this->movilizacion_hora_llegada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->movilizacion_hora_llegada;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   function xls_sub_cons_label($lines)
   {
         foreach ($lines as $col => $dados)
         {
             if (isset($dados['col_span_i'])) {
                 $this->Xls_col += $dados['col_span_i'];
             }
             $current_cell_ref = $this->calc_cell($this->Xls_col);
             if ($dados['align'] == 'left') {
                 $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             }
             else {
                 $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
             }
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $dados['data']);
             $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
             if ($dados['autosize'] == 's') {
                 $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
             }
             if (isset($dados['col_span_f'])) {
                 $this->Xls_col += $dados['col_span_f'];
             }
             else {
                 $this->Xls_col++;
             }
         }
   }
   function xls_sub_cons_lines($lines)
   {
         foreach ($lines as $icol => $dados)
         {
             if (isset($dados['col_span_i'])) {
                 $this->Xls_col += $dados['col_span_i'];
             }
             $current_cell_ref = $this->calc_cell($this->Xls_col);
             if ($dados['align'] == 'left') {
                 $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
             }
             else {
                 $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
             }
             if ($dados['type'] == 'img') {
                 if (is_file($dados['data']))
                 { 
                     $sc_obj_img = new nm_trata_img($dados['data']);
                     $nm_image_altura  = $sc_obj_img->getHeight();
                     $nm_image_largura = $sc_obj_img->getWidth();
                     $objDrawing = new PHPExcel_Worksheet_Drawing();
                     if (!empty($dados['name'])) {
                         $objDrawing->setName($dados['name']);
                     } 
                     $objDrawing->setPath($dados['data']);
                     $objDrawing->setHeight($nm_image_altura);
                     $col = $current_cell_ref;
                     $objDrawing->setCoordinates($col . $this->Xls_row);
                     $objDrawing->setWorksheet($this->Nm_ActiveSheet);
                     if (!isset($this->NM_Col_din[$col]) || $this->NM_Col_din[$col] < $nm_image_largura)
                     { 
                         $this->NM_Col_din[$col] = $nm_image_largura;
                     } 
                     if (!isset($this->NM_Row_din[$this->Xls_row]) || $this->NM_Row_din[$this->Xls_row] < $nm_image_altura)
                     { 
                         $this->NM_Row_din[$this->Xls_row] = $nm_image_altura;
                     } 
                 } 
                 else 
                 { 
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                     $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, ' ');
                 } 
             } 
             elseif ($dados['type'] == 'data') {
                 if (empty($dados['data']) || $dados['data'] == "0000-00-00") {
                     $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $dados['data'], PHPExcel_Cell_DataType::TYPE_STRING);
                 }
                 else {
                     $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $dados['data']);
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($dados['format']);
                 }
             } 
             elseif ($dados['type'] == 'num') {
                 if (is_numeric($dados['data'])) {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($dados['format']);
                 }
                 $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $dados['data']);
             } 
             else { 
                $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $dados['data'], PHPExcel_Cell_DataType::TYPE_STRING);
             } 
             if (isset($dados['bold'])){ 
                 $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
             } 
             if ($dados['autosize'] == 's') {
                 $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
             }
             if (isset($dados['col_span_f'])) {
                 $this->Xls_col += $dados['col_span_f'];
             }
             else {
                 $this->Xls_col++;
             }
         }
         if ($this->Xls_row > $this->New_Xls_row) {
             $this->New_Xls_row = $this->Xls_row;
         }
         if (isset($dados['row_span_f'])) {
             $this->Xls_row += $dados['row_span_f'];
         }
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> movilizacion :: Excel</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/sys__NM__ico__NM__favicons_ame_nuevo.png">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XLS</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_movilizacion_impresion_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_movilizacion_impresion"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['xls_return']); ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
