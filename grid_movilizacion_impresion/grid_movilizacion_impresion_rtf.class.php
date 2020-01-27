<?php

class grid_movilizacion_impresion_rtf
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
      $this->Arquivo   .= "_grid_movilizacion_impresion";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_movilizacion_impresion.rtf";
   }

   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['rtf_name']);
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

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['idusuario'])) ? $this->New_label['idusuario'] : "Conductor"; 
          if ($Cada_col == "idusuario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['movilizacion_funcionario'])) ? $this->New_label['movilizacion_funcionario'] : "Funcionario"; 
          if ($Cada_col == "movilizacion_funcionario" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['movilizacion_fecha'])) ? $this->New_label['movilizacion_fecha'] : "Fecha de Movilización"; 
          if ($Cada_col == "movilizacion_fecha" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['movilizacion_km_salida'])) ? $this->New_label['movilizacion_km_salida'] : "Kilometraje de Salida"; 
          if ($Cada_col == "movilizacion_km_salida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['movilizacion_km_llegada'])) ? $this->New_label['movilizacion_km_llegada'] : "Kilometraje de Llegada"; 
          if ($Cada_col == "movilizacion_km_llegada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['movilizacion_recorrido_vehiculo'])) ? $this->New_label['movilizacion_recorrido_vehiculo'] : "Kilometraje Recorrido por Vehiculo"; 
          if ($Cada_col == "movilizacion_recorrido_vehiculo" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['movilizacion_ruta'])) ? $this->New_label['movilizacion_ruta'] : "Movilizacion Ruta"; 
          if ($Cada_col == "movilizacion_ruta" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['movilizacion_hora_salida'])) ? $this->New_label['movilizacion_hora_salida'] : "Movilizacion Hora Salida"; 
          if ($Cada_col == "movilizacion_hora_salida" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['movilizacion_hora_llegada'])) ? $this->New_label['movilizacion_hora_llegada'] : "Movilizacion Hora Llegada"; 
          if ($Cada_col == "movilizacion_hora_llegada" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
      $this->Sub_Consultas[] = "rutas";
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
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $this->Texto_tag .= "<tr>\r\n";
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
            if ((!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off") && !in_array($Cada_col, $this->Sub_Consultas))
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
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
   }
   //----- idusuario
   function NM_export_idusuario()
   {
         nmgp_Form_Num_Val($this->look_idusuario, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->look_idusuario))
         {
             $this->look_idusuario = sc_convert_encoding($this->look_idusuario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_idusuario = str_replace('<', '&lt;', $this->look_idusuario);
         $this->look_idusuario = str_replace('>', '&gt;', $this->look_idusuario);
         $this->Texto_tag .= "<td>" . $this->look_idusuario . "</td>\r\n";
   }
   //----- movilizacion_funcionario
   function NM_export_movilizacion_funcionario()
   {
         $this->look_movilizacion_funcionario = html_entity_decode($this->look_movilizacion_funcionario, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_movilizacion_funcionario = strip_tags($this->look_movilizacion_funcionario);
         if (!NM_is_utf8($this->look_movilizacion_funcionario))
         {
             $this->look_movilizacion_funcionario = sc_convert_encoding($this->look_movilizacion_funcionario, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_movilizacion_funcionario = str_replace('<', '&lt;', $this->look_movilizacion_funcionario);
         $this->look_movilizacion_funcionario = str_replace('>', '&gt;', $this->look_movilizacion_funcionario);
         $this->Texto_tag .= "<td>" . $this->look_movilizacion_funcionario . "</td>\r\n";
   }
   //----- movilizacion_fecha
   function NM_export_movilizacion_fecha()
   {
         $conteudo_x =  $this->movilizacion_fecha;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->movilizacion_fecha, "YYYY-MM-DD  ");
             $this->movilizacion_fecha = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
         } 
         if (!NM_is_utf8($this->movilizacion_fecha))
         {
             $this->movilizacion_fecha = sc_convert_encoding($this->movilizacion_fecha, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->movilizacion_fecha = str_replace('<', '&lt;', $this->movilizacion_fecha);
         $this->movilizacion_fecha = str_replace('>', '&gt;', $this->movilizacion_fecha);
         $this->Texto_tag .= "<td>" . $this->movilizacion_fecha . "</td>\r\n";
   }
   //----- movilizacion_km_salida
   function NM_export_movilizacion_km_salida()
   {
         nmgp_Form_Num_Val($this->movilizacion_km_salida, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->movilizacion_km_salida))
         {
             $this->movilizacion_km_salida = sc_convert_encoding($this->movilizacion_km_salida, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->movilizacion_km_salida = str_replace('<', '&lt;', $this->movilizacion_km_salida);
         $this->movilizacion_km_salida = str_replace('>', '&gt;', $this->movilizacion_km_salida);
         $this->Texto_tag .= "<td>" . $this->movilizacion_km_salida . "</td>\r\n";
   }
   //----- movilizacion_km_llegada
   function NM_export_movilizacion_km_llegada()
   {
         nmgp_Form_Num_Val($this->movilizacion_km_llegada, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->movilizacion_km_llegada))
         {
             $this->movilizacion_km_llegada = sc_convert_encoding($this->movilizacion_km_llegada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->movilizacion_km_llegada = str_replace('<', '&lt;', $this->movilizacion_km_llegada);
         $this->movilizacion_km_llegada = str_replace('>', '&gt;', $this->movilizacion_km_llegada);
         $this->Texto_tag .= "<td>" . $this->movilizacion_km_llegada . "</td>\r\n";
   }
   //----- movilizacion_recorrido_vehiculo
   function NM_export_movilizacion_recorrido_vehiculo()
   {
         nmgp_Form_Num_Val($this->movilizacion_recorrido_vehiculo, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         if (!NM_is_utf8($this->movilizacion_recorrido_vehiculo))
         {
             $this->movilizacion_recorrido_vehiculo = sc_convert_encoding($this->movilizacion_recorrido_vehiculo, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->movilizacion_recorrido_vehiculo = str_replace('<', '&lt;', $this->movilizacion_recorrido_vehiculo);
         $this->movilizacion_recorrido_vehiculo = str_replace('>', '&gt;', $this->movilizacion_recorrido_vehiculo);
         $this->Texto_tag .= "<td>" . $this->movilizacion_recorrido_vehiculo . "</td>\r\n";
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
   //----- movilizacion_ruta
   function NM_export_movilizacion_ruta()
   {
         $this->movilizacion_ruta = html_entity_decode($this->movilizacion_ruta, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->movilizacion_ruta = strip_tags($this->movilizacion_ruta);
         if (!NM_is_utf8($this->movilizacion_ruta))
         {
             $this->movilizacion_ruta = sc_convert_encoding($this->movilizacion_ruta, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->movilizacion_ruta = str_replace('<', '&lt;', $this->movilizacion_ruta);
         $this->movilizacion_ruta = str_replace('>', '&gt;', $this->movilizacion_ruta);
         $this->Texto_tag .= "<td>" . $this->movilizacion_ruta . "</td>\r\n";
   }
   //----- movilizacion_hora_salida
   function NM_export_movilizacion_hora_salida()
   {
         $conteudo_x =  $this->movilizacion_hora_salida;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->movilizacion_hora_salida, "HH:II:SS  ");
             $this->movilizacion_hora_salida = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
         if (!NM_is_utf8($this->movilizacion_hora_salida))
         {
             $this->movilizacion_hora_salida = sc_convert_encoding($this->movilizacion_hora_salida, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->movilizacion_hora_salida = str_replace('<', '&lt;', $this->movilizacion_hora_salida);
         $this->movilizacion_hora_salida = str_replace('>', '&gt;', $this->movilizacion_hora_salida);
         $this->Texto_tag .= "<td>" . $this->movilizacion_hora_salida . "</td>\r\n";
   }
   //----- movilizacion_hora_llegada
   function NM_export_movilizacion_hora_llegada()
   {
         $conteudo_x =  $this->movilizacion_hora_llegada;
         nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->movilizacion_hora_llegada, "HH:II:SS  ");
             $this->movilizacion_hora_llegada = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
         } 
         if (!NM_is_utf8($this->movilizacion_hora_llegada))
         {
             $this->movilizacion_hora_llegada = sc_convert_encoding($this->movilizacion_hora_llegada, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->movilizacion_hora_llegada = str_replace('<', '&lt;', $this->movilizacion_hora_llegada);
         $this->movilizacion_hora_llegada = str_replace('>', '&gt;', $this->movilizacion_hora_llegada);
         $this->Texto_tag .= "<td>" . $this->movilizacion_hora_llegada . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_movilizacion_impresion'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> movilizacion :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_movilizacion_impresion_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_movilizacion_impresion"> 
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
