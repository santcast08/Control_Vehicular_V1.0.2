<?php

class grid_detalle_movilizacion_reporte_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
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

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_detalle_movilizacion_reporte";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_detalle_movilizacion_reporte.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_detalle_movilizacion_reporte']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_detalle_movilizacion_reporte']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_detalle_movilizacion_reporte']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['where_pesq_filtro'];
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();
      $this->count_span = 0;

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['detalle_movilizacion_origen'])) ? $this->New_label['detalle_movilizacion_origen'] : "Detalle Movilizacion Origen"; 
          if ($Cada_col == "detalle_movilizacion_origen" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle_movilizacion_destino'])) ? $this->New_label['detalle_movilizacion_destino'] : "Detalle Movilizacion Destino"; 
          if ($Cada_col == "detalle_movilizacion_destino" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle_movilizacion_fecha_inicio'])) ? $this->New_label['detalle_movilizacion_fecha_inicio'] : "Detalle Movilizacion Fecha Inicio"; 
          if ($Cada_col == "detalle_movilizacion_fecha_inicio" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['detalle_movilizacion_fecha_fin'])) ? $this->New_label['detalle_movilizacion_fecha_fin'] : "Detalle Movilizacion Fecha Fin"; 
          if ($Cada_col == "detalle_movilizacion_fecha_fin" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['iddetalle_movilizacion'])) ? $this->New_label['iddetalle_movilizacion'] : "Iddetalle Movilizacion"; 
          if ($Cada_col == "iddetalle_movilizacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['id_movilizacion'])) ? $this->New_label['id_movilizacion'] : "Id Movilizacion"; 
          if ($Cada_col == "id_movilizacion" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->iddetalle_movilizacion = $Busca_temp['iddetalle_movilizacion']; 
          $tmp_pos = strpos($this->iddetalle_movilizacion, "##@@");
          if ($tmp_pos !== false && !is_array($this->iddetalle_movilizacion))
          {
              $this->iddetalle_movilizacion = substr($this->iddetalle_movilizacion, 0, $tmp_pos);
          }
          $this->detalle_movilizacion_origen = $Busca_temp['detalle_movilizacion_origen']; 
          $tmp_pos = strpos($this->detalle_movilizacion_origen, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle_movilizacion_origen))
          {
              $this->detalle_movilizacion_origen = substr($this->detalle_movilizacion_origen, 0, $tmp_pos);
          }
          $this->detalle_movilizacion_destino = $Busca_temp['detalle_movilizacion_destino']; 
          $tmp_pos = strpos($this->detalle_movilizacion_destino, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle_movilizacion_destino))
          {
              $this->detalle_movilizacion_destino = substr($this->detalle_movilizacion_destino, 0, $tmp_pos);
          }
          $this->detalle_movilizacion_fecha_inicio = $Busca_temp['detalle_movilizacion_fecha_inicio']; 
          $tmp_pos = strpos($this->detalle_movilizacion_fecha_inicio, "##@@");
          if ($tmp_pos !== false && !is_array($this->detalle_movilizacion_fecha_inicio))
          {
              $this->detalle_movilizacion_fecha_inicio = substr($this->detalle_movilizacion_fecha_inicio, 0, $tmp_pos);
          }
          $this->detalle_movilizacion_fecha_inicio_2 = $Busca_temp['detalle_movilizacion_fecha_inicio_input_2']; 
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT detalle_movilizacion_origen, detalle_movilizacion_destino, str_replace (convert(char(10),detalle_movilizacion_fecha_inicio,102), '.', '-') + ' ' + convert(char(8),detalle_movilizacion_fecha_inicio,20), str_replace (convert(char(10),detalle_movilizacion_fecha_fin,102), '.', '-') + ' ' + convert(char(8),detalle_movilizacion_fecha_fin,20), iddetalle_movilizacion, Id_Movilizacion from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT detalle_movilizacion_origen, detalle_movilizacion_destino, detalle_movilizacion_fecha_inicio, detalle_movilizacion_fecha_fin, iddetalle_movilizacion, Id_Movilizacion from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT detalle_movilizacion_origen, detalle_movilizacion_destino, convert(char(23),detalle_movilizacion_fecha_inicio,121), convert(char(23),detalle_movilizacion_fecha_fin,121), iddetalle_movilizacion, Id_Movilizacion from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT detalle_movilizacion_origen, detalle_movilizacion_destino, detalle_movilizacion_fecha_inicio, detalle_movilizacion_fecha_fin, iddetalle_movilizacion, Id_Movilizacion from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT detalle_movilizacion_origen, detalle_movilizacion_destino, EXTEND(detalle_movilizacion_fecha_inicio, YEAR TO DAY), EXTEND(detalle_movilizacion_fecha_fin, YEAR TO DAY), iddetalle_movilizacion, Id_Movilizacion from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT detalle_movilizacion_origen, detalle_movilizacion_destino, detalle_movilizacion_fecha_inicio, detalle_movilizacion_fecha_fin, iddetalle_movilizacion, Id_Movilizacion from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $this->Texto_tag .= "<tr>\r\n";
         $this->detalle_movilizacion_origen = $rs->fields[0] ;  
         $this->detalle_movilizacion_destino = $rs->fields[1] ;  
         $this->detalle_movilizacion_fecha_inicio = $rs->fields[2] ;  
         $this->detalle_movilizacion_fecha_fin = $rs->fields[3] ;  
         $this->iddetalle_movilizacion = $rs->fields[4] ;  
         $this->iddetalle_movilizacion = (string)$this->iddetalle_movilizacion;
         $this->id_movilizacion = $rs->fields[5] ;  
         $this->id_movilizacion = (string)$this->id_movilizacion;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- detalle_movilizacion_origen
   function NM_export_detalle_movilizacion_origen()
   {
         $this->detalle_movilizacion_origen = html_entity_decode($this->detalle_movilizacion_origen, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalle_movilizacion_origen = strip_tags($this->detalle_movilizacion_origen);
         if (!NM_is_utf8($this->detalle_movilizacion_origen))
         {
             $this->detalle_movilizacion_origen = sc_convert_encoding($this->detalle_movilizacion_origen, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->detalle_movilizacion_origen = str_replace('<', '&lt;', $this->detalle_movilizacion_origen);
         $this->detalle_movilizacion_origen = str_replace('>', '&gt;', $this->detalle_movilizacion_origen);
         $this->Texto_tag .= "<td>" . $this->detalle_movilizacion_origen . "</td>\r\n";
   }
   //----- detalle_movilizacion_destino
   function NM_export_detalle_movilizacion_destino()
   {
         $this->detalle_movilizacion_destino = html_entity_decode($this->detalle_movilizacion_destino, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->detalle_movilizacion_destino = strip_tags($this->detalle_movilizacion_destino);
         if (!NM_is_utf8($this->detalle_movilizacion_destino))
         {
             $this->detalle_movilizacion_destino = sc_convert_encoding($this->detalle_movilizacion_destino, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->detalle_movilizacion_destino = str_replace('<', '&lt;', $this->detalle_movilizacion_destino);
         $this->detalle_movilizacion_destino = str_replace('>', '&gt;', $this->detalle_movilizacion_destino);
         $this->Texto_tag .= "<td>" . $this->detalle_movilizacion_destino . "</td>\r\n";
   }
   //----- detalle_movilizacion_fecha_inicio
   function NM_export_detalle_movilizacion_fecha_inicio()
   {
         $conteudo_x =  $this->detalle_movilizacion_fecha_inicio;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->detalle_movilizacion_fecha_inicio, "YYYY-MM-DD  ");
             $this->detalle_movilizacion_fecha_inicio = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->detalle_movilizacion_fecha_inicio))
         {
             $this->detalle_movilizacion_fecha_inicio = sc_convert_encoding($this->detalle_movilizacion_fecha_inicio, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->detalle_movilizacion_fecha_inicio = str_replace('<', '&lt;', $this->detalle_movilizacion_fecha_inicio);
         $this->detalle_movilizacion_fecha_inicio = str_replace('>', '&gt;', $this->detalle_movilizacion_fecha_inicio);
         $this->Texto_tag .= "<td>" . $this->detalle_movilizacion_fecha_inicio . "</td>\r\n";
   }
   //----- detalle_movilizacion_fecha_fin
   function NM_export_detalle_movilizacion_fecha_fin()
   {
         $conteudo_x =  $this->detalle_movilizacion_fecha_fin;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->detalle_movilizacion_fecha_fin, "YYYY-MM-DD  ");
             $this->detalle_movilizacion_fecha_fin = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->detalle_movilizacion_fecha_fin))
         {
             $this->detalle_movilizacion_fecha_fin = sc_convert_encoding($this->detalle_movilizacion_fecha_fin, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->detalle_movilizacion_fecha_fin = str_replace('<', '&lt;', $this->detalle_movilizacion_fecha_fin);
         $this->detalle_movilizacion_fecha_fin = str_replace('>', '&gt;', $this->detalle_movilizacion_fecha_fin);
         $this->Texto_tag .= "<td>" . $this->detalle_movilizacion_fecha_fin . "</td>\r\n";
   }
   //----- iddetalle_movilizacion
   function NM_export_iddetalle_movilizacion()
   {
         nmgp_Form_Num_Val($this->iddetalle_movilizacion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->iddetalle_movilizacion))
         {
             $this->iddetalle_movilizacion = sc_convert_encoding($this->iddetalle_movilizacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->iddetalle_movilizacion = str_replace('<', '&lt;', $this->iddetalle_movilizacion);
         $this->iddetalle_movilizacion = str_replace('>', '&gt;', $this->iddetalle_movilizacion);
         $this->Texto_tag .= "<td>" . $this->iddetalle_movilizacion . "</td>\r\n";
   }
   //----- id_movilizacion
   function NM_export_id_movilizacion()
   {
         nmgp_Form_Num_Val($this->id_movilizacion, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->id_movilizacion))
         {
             $this->id_movilizacion = sc_convert_encoding($this->id_movilizacion, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->id_movilizacion = str_replace('<', '&lt;', $this->id_movilizacion);
         $this->id_movilizacion = str_replace('>', '&gt;', $this->id_movilizacion);
         $this->Texto_tag .= "<td>" . $this->id_movilizacion . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_detalle_movilizacion_reporte'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> detalle_movilizacion :: RTF</TITLE>
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
   <td class="scExportTitle" style="height: 25px">RTF</td>
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
<form name="Fdown" method="get" action="grid_detalle_movilizacion_reporte_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_detalle_movilizacion_reporte"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
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
