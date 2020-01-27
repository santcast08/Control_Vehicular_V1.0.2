<?php
//
class form_movilizacion_impresion_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'navSummary'        => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => '',
                                'ajaxMessage'       => '',
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id_movilizacion;
   var $idvehiculo;
   var $idusuario;
   var $idusuario_1;
   var $movilizacion_funcionario;
   var $movilizacion_funcionario_1;
   var $movilizacion_fecha;
   var $movilizacion_ruta;
   var $movilizacion_hora_salida;
   var $movilizacion_hora_llegada;
   var $movilizacion_km_salida;
   var $movilizacion_km_llegada;
   var $movilizacion_costo_galon;
   var $movilizacion_cant_km_adicional;
   var $movilizacion_total_km_recorrido;
   var $movilizacion_recorrido_vehiculo;
   var $movilizacion_excedente;
   var $movilizacion_total_galones;
   var $movilizacion_total_combustible;
   var $km_galon;
   var $km_galon_1;
   var $detalle_movilizacion;
   var $libre;
   var $libre2;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['detalle_movilizacion']))
          {
              $this->detalle_movilizacion = $this->NM_ajax_info['param']['detalle_movilizacion'];
          }
          if (isset($this->NM_ajax_info['param']['id_movilizacion']))
          {
              $this->id_movilizacion = $this->NM_ajax_info['param']['id_movilizacion'];
          }
          if (isset($this->NM_ajax_info['param']['idusuario']))
          {
              $this->idusuario = $this->NM_ajax_info['param']['idusuario'];
          }
          if (isset($this->NM_ajax_info['param']['idvehiculo']))
          {
              $this->idvehiculo = $this->NM_ajax_info['param']['idvehiculo'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_cant_km_adicional']))
          {
              $this->movilizacion_cant_km_adicional = $this->NM_ajax_info['param']['movilizacion_cant_km_adicional'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_costo_galon']))
          {
              $this->movilizacion_costo_galon = $this->NM_ajax_info['param']['movilizacion_costo_galon'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_excedente']))
          {
              $this->movilizacion_excedente = $this->NM_ajax_info['param']['movilizacion_excedente'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_fecha']))
          {
              $this->movilizacion_fecha = $this->NM_ajax_info['param']['movilizacion_fecha'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_funcionario']))
          {
              $this->movilizacion_funcionario = $this->NM_ajax_info['param']['movilizacion_funcionario'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_hora_llegada']))
          {
              $this->movilizacion_hora_llegada = $this->NM_ajax_info['param']['movilizacion_hora_llegada'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_hora_salida']))
          {
              $this->movilizacion_hora_salida = $this->NM_ajax_info['param']['movilizacion_hora_salida'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_km_llegada']))
          {
              $this->movilizacion_km_llegada = $this->NM_ajax_info['param']['movilizacion_km_llegada'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_km_salida']))
          {
              $this->movilizacion_km_salida = $this->NM_ajax_info['param']['movilizacion_km_salida'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_recorrido_vehiculo']))
          {
              $this->movilizacion_recorrido_vehiculo = $this->NM_ajax_info['param']['movilizacion_recorrido_vehiculo'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_total_combustible']))
          {
              $this->movilizacion_total_combustible = $this->NM_ajax_info['param']['movilizacion_total_combustible'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_total_galones']))
          {
              $this->movilizacion_total_galones = $this->NM_ajax_info['param']['movilizacion_total_galones'];
          }
          if (isset($this->NM_ajax_info['param']['movilizacion_total_km_recorrido']))
          {
              $this->movilizacion_total_km_recorrido = $this->NM_ajax_info['param']['movilizacion_total_km_recorrido'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->Movilizacion_id) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Movilizacion_id'] = $this->Movilizacion_id;
      }
      if (isset($_POST["Movilizacion_id"]) && isset($this->Movilizacion_id)) 
      {
          $_SESSION['Movilizacion_id'] = $this->Movilizacion_id;
      }
      if (!isset($_POST["Movilizacion_id"]) && isset($_POST["movilizacion_id"])) 
      {
          $_SESSION['Movilizacion_id'] = $this->movilizacion_id;
      }
      if (isset($_GET["Movilizacion_id"]) && isset($this->Movilizacion_id)) 
      {
          $_SESSION['Movilizacion_id'] = $this->Movilizacion_id;
      }
      if (!isset($_GET["Movilizacion_id"]) && isset($_GET["movilizacion_id"])) 
      {
          $_SESSION['Movilizacion_id'] = $this->movilizacion_id;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_movilizacion_impresion_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->Movilizacion_id) && isset($this->movilizacion_id)) 
          {
              $this->Movilizacion_id = $this->movilizacion_id;
          }
          if (isset($this->Movilizacion_id)) 
          {
              $_SESSION['Movilizacion_id'] = $this->Movilizacion_id;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->Movilizacion_id) && isset($this->movilizacion_id)) 
          {
              $this->Movilizacion_id = $this->movilizacion_id;
          }
          if (isset($this->Movilizacion_id)) 
          {
              $_SESSION['Movilizacion_id'] = $this->Movilizacion_id;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_movilizacion_impresion_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_movilizacion_impresion_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_movilizacion_impresion_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_movilizacion_impresion_mob'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_movilizacion_impresion_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_movilizacion_impresion_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_movilizacion_impresion_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_movilizacion_impresion_mob']['label'] = "Reporte Hoja de Rutas y Control de Combustible y Kilometraje";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_movilizacion_impresion_mob")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';


      $this->arr_buttons['imprimir']['hint']             = "";
      $this->arr_buttons['imprimir']['type']             = "button";
      $this->arr_buttons['imprimir']['value']            = "imprimir";
      $this->arr_buttons['imprimir']['display']          = "only_text";
      $this->arr_buttons['imprimir']['display_position'] = "text_right";
      $this->arr_buttons['imprimir']['style']            = "default";
      $this->arr_buttons['imprimir']['image']            = "";

      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['form_movilizacion_impresion_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_movilizacion_impresion_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['imprimir'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_orig'] = " where Id_Movilizacion = " . $_SESSION['Movilizacion_id'] . "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_pesq'] = " where Id_Movilizacion = " . $_SESSION['Movilizacion_id'] . "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_movilizacion_impresion_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_movilizacion_impresion_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_movilizacion_impresion_mob'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_form'];
          if (!isset($this->movilizacion_ruta)){$this->movilizacion_ruta = $this->nmgp_dados_form['movilizacion_ruta'];} 
          if (!isset($this->km_galon)){$this->km_galon = $this->nmgp_dados_form['km_galon'];} 
          if (!isset($this->libre)){$this->libre = $this->nmgp_dados_form['libre'];} 
          if (!isset($this->libre2)){$this->libre2 = $this->nmgp_dados_form['libre2'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_movilizacion_impresion_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_movilizacion_impresion/form_movilizacion_impresion_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_movilizacion_impresion_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_movilizacion_impresion_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_movilizacion_impresion_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_movilizacion_impresion/form_movilizacion_impresion_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_movilizacion_impresion_mob_erro.class.php"); 
      }
      $this->Erro      = new form_movilizacion_impresion_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opcao']))
         { 
             if ($this->id_movilizacion != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_movilizacion_impresion_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['imprimir'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['imprimir'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['botoes']['imprimir'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detalle_movilizacion_impresion_mob') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_detalle_movilizacion_impresion_mob') . "/form_detalle_movilizacion_impresion_mob_apl.php");
          $this->form_detalle_movilizacion_impresion_mob = new form_detalle_movilizacion_impresion_mob_apl;
      }
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->id_movilizacion)) { $this->nm_limpa_alfa($this->id_movilizacion); }
      if (isset($this->idvehiculo)) { $this->nm_limpa_alfa($this->idvehiculo); }
      if (isset($this->idusuario)) { $this->nm_limpa_alfa($this->idusuario); }
      if (isset($this->movilizacion_funcionario)) { $this->nm_limpa_alfa($this->movilizacion_funcionario); }
      if (isset($this->movilizacion_km_salida)) { $this->nm_limpa_alfa($this->movilizacion_km_salida); }
      if (isset($this->movilizacion_km_llegada)) { $this->nm_limpa_alfa($this->movilizacion_km_llegada); }
      if (isset($this->movilizacion_costo_galon)) { $this->nm_limpa_alfa($this->movilizacion_costo_galon); }
      if (isset($this->movilizacion_cant_km_adicional)) { $this->nm_limpa_alfa($this->movilizacion_cant_km_adicional); }
      if (isset($this->movilizacion_total_km_recorrido)) { $this->nm_limpa_alfa($this->movilizacion_total_km_recorrido); }
      if (isset($this->movilizacion_recorrido_vehiculo)) { $this->nm_limpa_alfa($this->movilizacion_recorrido_vehiculo); }
      if (isset($this->movilizacion_excedente)) { $this->nm_limpa_alfa($this->movilizacion_excedente); }
      if (isset($this->movilizacion_total_galones)) { $this->nm_limpa_alfa($this->movilizacion_total_galones); }
      if (isset($this->movilizacion_total_combustible)) { $this->nm_limpa_alfa($this->movilizacion_total_combustible); }
      if (isset($this->detalle_movilizacion)) { $this->nm_limpa_alfa($this->detalle_movilizacion); }
      if ($nm_opc_lookup == "lookup")
      { 
          if ($GLOBALS['F'] == "idvehiculo")
          { 
              $nm_parms   = substr($GLOBALS['P0'], 1, strlen($GLOBALS['P0']) - 2);
              $array_vars = explode(",", $nm_parms);
              $this->idvehiculo = $array_vars[0];
              $idvehiculo       = $this->idvehiculo;
              nm_limpa_numero($idvehiculo, $this->field_config['idvehiculo']['symbol_grp']); 
              $this->idvehiculo       = $idvehiculo;
              $this->lookup_idvehiculo($conteudo);
              $conteudo = str_replace("&", "&amp;", $conteudo); 
              $conteudo = str_replace("\/" , "\/", $conteudo); 
              echo "<html><head></head>";
              echo " <body onload=\"p=document.layers?parentLayer:window.parent;p.jsrsLoaded('" . $GLOBALS['C'] . "');\">";
              echo "  jsrsPayload:";
              echo "  <br>";
              echo "  <form name=\"jsrs_Form\"><textarea name=\"jsrs_Payload\">";
              echo "$conteudo";
              echo " </textarea></form></body></html>";
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id_movilizacion
      $this->field_config['id_movilizacion']               = array();
      $this->field_config['id_movilizacion']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_movilizacion']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_movilizacion']['symbol_dec'] = '';
      $this->field_config['id_movilizacion']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_movilizacion']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- movilizacion_fecha
      $this->field_config['movilizacion_fecha']                 = array();
      $this->field_config['movilizacion_fecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['movilizacion_fecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['movilizacion_fecha']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'movilizacion_fecha');
      //-- idvehiculo
      $this->field_config['idvehiculo']               = array();
      $this->field_config['idvehiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idvehiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idvehiculo']['symbol_dec'] = '';
      $this->field_config['idvehiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idvehiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- movilizacion_hora_salida
      $this->field_config['movilizacion_hora_salida']                 = array();
      $this->field_config['movilizacion_hora_salida']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['movilizacion_hora_salida']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['movilizacion_hora_salida']['date_display'] = "hhii";
      $this->new_date_format('HH', 'movilizacion_hora_salida');
      //-- movilizacion_total_combustible
      $this->field_config['movilizacion_total_combustible']               = array();
      $this->field_config['movilizacion_total_combustible']['symbol_grp'] = '';
      $this->field_config['movilizacion_total_combustible']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['movilizacion_total_combustible']['symbol_dec'] = ',';
      $this->field_config['movilizacion_total_combustible']['symbol_mon'] = '$';
      $this->field_config['movilizacion_total_combustible']['format_pos'] = '3';
      $this->field_config['movilizacion_total_combustible']['format_neg'] = '2';
      //-- movilizacion_hora_llegada
      $this->field_config['movilizacion_hora_llegada']                 = array();
      $this->field_config['movilizacion_hora_llegada']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['movilizacion_hora_llegada']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['movilizacion_hora_llegada']['date_display'] = "hhii";
      $this->new_date_format('HH', 'movilizacion_hora_llegada');
      //-- movilizacion_total_galones
      $this->field_config['movilizacion_total_galones']               = array();
      $this->field_config['movilizacion_total_galones']['symbol_grp'] = '';
      $this->field_config['movilizacion_total_galones']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['movilizacion_total_galones']['symbol_dec'] = ',';
      $this->field_config['movilizacion_total_galones']['symbol_mon'] = '';
      $this->field_config['movilizacion_total_galones']['format_pos'] = '3';
      $this->field_config['movilizacion_total_galones']['format_neg'] = '2';
      //-- movilizacion_km_salida
      $this->field_config['movilizacion_km_salida']               = array();
      $this->field_config['movilizacion_km_salida']['symbol_grp'] = '';
      $this->field_config['movilizacion_km_salida']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['movilizacion_km_salida']['symbol_dec'] = '';
      $this->field_config['movilizacion_km_salida']['symbol_neg'] = '-';
      $this->field_config['movilizacion_km_salida']['format_neg'] = '2';
      //-- movilizacion_cant_km_adicional
      $this->field_config['movilizacion_cant_km_adicional']               = array();
      $this->field_config['movilizacion_cant_km_adicional']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['movilizacion_cant_km_adicional']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['movilizacion_cant_km_adicional']['symbol_dec'] = '';
      $this->field_config['movilizacion_cant_km_adicional']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['movilizacion_cant_km_adicional']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- movilizacion_km_llegada
      $this->field_config['movilizacion_km_llegada']               = array();
      $this->field_config['movilizacion_km_llegada']['symbol_grp'] = '';
      $this->field_config['movilizacion_km_llegada']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['movilizacion_km_llegada']['symbol_dec'] = '';
      $this->field_config['movilizacion_km_llegada']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['movilizacion_km_llegada']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- movilizacion_excedente
      $this->field_config['movilizacion_excedente']               = array();
      $this->field_config['movilizacion_excedente']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['movilizacion_excedente']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['movilizacion_excedente']['symbol_dec'] = '';
      $this->field_config['movilizacion_excedente']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['movilizacion_excedente']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- movilizacion_recorrido_vehiculo
      $this->field_config['movilizacion_recorrido_vehiculo']               = array();
      $this->field_config['movilizacion_recorrido_vehiculo']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['movilizacion_recorrido_vehiculo']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['movilizacion_recorrido_vehiculo']['symbol_dec'] = '';
      $this->field_config['movilizacion_recorrido_vehiculo']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['movilizacion_recorrido_vehiculo']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- movilizacion_total_km_recorrido
      $this->field_config['movilizacion_total_km_recorrido']               = array();
      $this->field_config['movilizacion_total_km_recorrido']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['movilizacion_total_km_recorrido']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['movilizacion_total_km_recorrido']['symbol_dec'] = '';
      $this->field_config['movilizacion_total_km_recorrido']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['movilizacion_total_km_recorrido']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- movilizacion_costo_galon
      $this->field_config['movilizacion_costo_galon']               = array();
      $this->field_config['movilizacion_costo_galon']['symbol_grp'] = '';
      $this->field_config['movilizacion_costo_galon']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['movilizacion_costo_galon']['symbol_dec'] = ',';
      $this->field_config['movilizacion_costo_galon']['symbol_mon'] = '';
      $this->field_config['movilizacion_costo_galon']['format_pos'] = '3';
      $this->field_config['movilizacion_costo_galon']['format_neg'] = '2';
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
         $this->libre = "&nbsp;";
         $this->libre2 = "&nbsp;";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_id_movilizacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_movilizacion');
          }
          if ('validate_movilizacion_fecha' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_fecha');
          }
          if ('validate_idusuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idusuario');
          }
          if ('validate_idvehiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idvehiculo');
          }
          if ('validate_movilizacion_funcionario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_funcionario');
          }
          if ('validate_movilizacion_hora_salida' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_hora_salida');
          }
          if ('validate_movilizacion_total_combustible' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_total_combustible');
          }
          if ('validate_movilizacion_hora_llegada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_hora_llegada');
          }
          if ('validate_movilizacion_total_galones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_total_galones');
          }
          if ('validate_movilizacion_km_salida' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_km_salida');
          }
          if ('validate_movilizacion_cant_km_adicional' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_cant_km_adicional');
          }
          if ('validate_movilizacion_km_llegada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_km_llegada');
          }
          if ('validate_movilizacion_excedente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_excedente');
          }
          if ('validate_movilizacion_recorrido_vehiculo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_recorrido_vehiculo');
          }
          if ('validate_movilizacion_total_km_recorrido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_total_km_recorrido');
          }
          if ('validate_movilizacion_costo_galon' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'movilizacion_costo_galon');
          }
          if ('validate_detalle_movilizacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'detalle_movilizacion');
          }
          form_movilizacion_impresion_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_movilizacion_km_llegada_onchange' == $this->NM_ajax_opcao)
          {
              $this->Movilizacion_Km_Llegada_onChange();
          }
          if ('event_idusuario_onclick' == $this->NM_ajax_opcao)
          {
              $this->idusuario_onClick();
          }
          form_movilizacion_impresion_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_movilizacion_impresion_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_movilizacion_impresion_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_movilizacion_impresion_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_movilizacion_impresion_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function lookup_idvehiculo(&$conteudo)
   {
      global  $idvehiculo;
      $this->nm_tira_formatacao();
      $this->formatado = false;
      $Salva_opc = $this->nmgp_opcao;
      $this->nmgp_opcao = "lookup_rpc";
      $this->nm_converte_datas();
      $this->nmgp_opcao = $Salva_opc;
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      $nm_comando = "SELECT Concat('Modelo: ',vehiculos.Vehiculo_Modelo,'---Placa: ',vehiculos.Vehiculo_Placa)
FROM vehiculos 
WHERE IdVehiculo = $this->idvehiculo 
ORDER BY Vehiculo_Placa"; 
      if ($this->idvehiculo == "")
      { 
          $conteudo = ""; 
          $this->nm_formatar_campos();
          return; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      {
          $conteudo = (isset($rs->fields[0])) ? $rs->fields[0] : ""; 
          $rs->Close() ; 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      {  
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0; 
      $this->nm_formatar_campos();
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'id_movilizacion':
               return "Numero de la Movilización";
               break;
           case 'movilizacion_fecha':
               return "Fecha";
               break;
           case 'idusuario':
               return "Conductor";
               break;
           case 'idvehiculo':
               return "Vehiculo";
               break;
           case 'movilizacion_funcionario':
               return "Funcionario";
               break;
           case 'movilizacion_hora_salida':
               return "Hora de Salida";
               break;
           case 'movilizacion_total_combustible':
               return "Costo Total de Combustible";
               break;
           case 'movilizacion_hora_llegada':
               return "Hora de Llegada";
               break;
           case 'movilizacion_total_galones':
               return "Total Galones Usados";
               break;
           case 'movilizacion_km_salida':
               return "Kilometraje de Salida";
               break;
           case 'movilizacion_cant_km_adicional':
               return "Cantidad de Kilometraje Adicional";
               break;
           case 'movilizacion_km_llegada':
               return "Kilometraje de Llegada";
               break;
           case 'movilizacion_excedente':
               return "Excedente";
               break;
           case 'movilizacion_recorrido_vehiculo':
               return "Kilometros Recorridos por el Vehículo";
               break;
           case 'movilizacion_total_km_recorrido':
               return "Total Kilometraje Recorrido";
               break;
           case 'movilizacion_costo_galon':
               return "Valor del Combustible";
               break;
           case 'detalle_movilizacion':
               return "Ingreso de Rutas de la Movilización";
               break;
           case 'movilizacion_ruta':
               return "Ruta";
               break;
           case 'km_galon':
               return "Kilometraje Promedio por Galón";
               break;
           case 'libre':
               return "libre";
               break;
           case 'libre2':
               return "libre2";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_movilizacion_impresion_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_movilizacion_impresion_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_movilizacion_impresion_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_movilizacion_impresion_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id_movilizacion' == $filtro)
        $this->ValidateField_id_movilizacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_fecha' == $filtro)
        $this->ValidateField_movilizacion_fecha($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idusuario' == $filtro)
        $this->ValidateField_idusuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idvehiculo' == $filtro)
        $this->ValidateField_idvehiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_funcionario' == $filtro)
        $this->ValidateField_movilizacion_funcionario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_hora_salida' == $filtro)
        $this->ValidateField_movilizacion_hora_salida($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_total_combustible' == $filtro)
        $this->ValidateField_movilizacion_total_combustible($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_hora_llegada' == $filtro)
        $this->ValidateField_movilizacion_hora_llegada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_total_galones' == $filtro)
        $this->ValidateField_movilizacion_total_galones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_km_salida' == $filtro)
        $this->ValidateField_movilizacion_km_salida($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_cant_km_adicional' == $filtro)
        $this->ValidateField_movilizacion_cant_km_adicional($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_km_llegada' == $filtro)
        $this->ValidateField_movilizacion_km_llegada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_excedente' == $filtro)
        $this->ValidateField_movilizacion_excedente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_recorrido_vehiculo' == $filtro)
        $this->ValidateField_movilizacion_recorrido_vehiculo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_total_km_recorrido' == $filtro)
        $this->ValidateField_movilizacion_total_km_recorrido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'movilizacion_costo_galon' == $filtro)
        $this->ValidateField_movilizacion_costo_galon($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'detalle_movilizacion' == $filtro)
        $this->ValidateField_detalle_movilizacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_id_movilizacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_movilizacion == "")  
      { 
          $this->id_movilizacion = 0;
      } 
      nm_limpa_numero($this->id_movilizacion, $this->field_config['id_movilizacion']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id_movilizacion != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_movilizacion) > $iTestSize)  
              { 
                  $Campos_Crit .= "Numero de la Movilización: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_movilizacion']))
                  {
                      $Campos_Erros['id_movilizacion'] = array();
                  }
                  $Campos_Erros['id_movilizacion'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_movilizacion']) || !is_array($this->NM_ajax_info['errList']['id_movilizacion']))
                  {
                      $this->NM_ajax_info['errList']['id_movilizacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_movilizacion'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_movilizacion, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "Numero de la Movilización; " ; 
                  if (!isset($Campos_Erros['id_movilizacion']))
                  {
                      $Campos_Erros['id_movilizacion'] = array();
                  }
                  $Campos_Erros['id_movilizacion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_movilizacion']) || !is_array($this->NM_ajax_info['errList']['id_movilizacion']))
                  {
                      $this->NM_ajax_info['errList']['id_movilizacion'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_movilizacion'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_movilizacion

    function ValidateField_movilizacion_fecha(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->movilizacion_fecha, $this->field_config['movilizacion_fecha']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['movilizacion_fecha']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['movilizacion_fecha']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['movilizacion_fecha']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['movilizacion_fecha']['date_sep']) ; 
          if (trim($this->movilizacion_fecha) != "")  
          { 
              if ($teste_validade->Data($this->movilizacion_fecha, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Fecha; " ; 
                  if (!isset($Campos_Erros['movilizacion_fecha']))
                  {
                      $Campos_Erros['movilizacion_fecha'] = array();
                  }
                  $Campos_Erros['movilizacion_fecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_fecha']) || !is_array($this->NM_ajax_info['errList']['movilizacion_fecha']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_fecha'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_fecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['movilizacion_fecha']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_movilizacion_fecha

    function ValidateField_idusuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
   if ($this->nmgp_opcao == "incluir")
   {
               if (!empty($this->idusuario) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario']) && !in_array($this->idusuario, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['idusuario']))
                   {
                       $Campos_Erros['idusuario'] = array();
                   }
                   $Campos_Erros['idusuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['idusuario']) || !is_array($this->NM_ajax_info['errList']['idusuario']))
                   {
                       $this->NM_ajax_info['errList']['idusuario'] = array();
                   }
                   $this->NM_ajax_info['errList']['idusuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
   }
    } // ValidateField_idusuario

    function ValidateField_idvehiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->idvehiculo == "")  
      { 
          $this->idvehiculo = 0;
          $this->sc_force_zero[] = 'idvehiculo';
      } 
      nm_limpa_numero($this->idvehiculo, $this->field_config['idvehiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idvehiculo != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idvehiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Vehiculo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idvehiculo']))
                  {
                      $Campos_Erros['idvehiculo'] = array();
                  }
                  $Campos_Erros['idvehiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idvehiculo']) || !is_array($this->NM_ajax_info['errList']['idvehiculo']))
                  {
                      $this->NM_ajax_info['errList']['idvehiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['idvehiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idvehiculo, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Vehiculo; " ; 
                  if (!isset($Campos_Erros['idvehiculo']))
                  {
                      $Campos_Erros['idvehiculo'] = array();
                  }
                  $Campos_Erros['idvehiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idvehiculo']) || !is_array($this->NM_ajax_info['errList']['idvehiculo']))
                  {
                      $this->NM_ajax_info['errList']['idvehiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['idvehiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_idvehiculo

    function ValidateField_movilizacion_funcionario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
   if ($this->nmgp_opcao == "incluir")
   {
               if (!empty($this->movilizacion_funcionario) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario']) && !in_array($this->movilizacion_funcionario, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['movilizacion_funcionario']))
                   {
                       $Campos_Erros['movilizacion_funcionario'] = array();
                   }
                   $Campos_Erros['movilizacion_funcionario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['movilizacion_funcionario']) || !is_array($this->NM_ajax_info['errList']['movilizacion_funcionario']))
                   {
                       $this->NM_ajax_info['errList']['movilizacion_funcionario'] = array();
                   }
                   $this->NM_ajax_info['errList']['movilizacion_funcionario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
   }
    } // ValidateField_movilizacion_funcionario

    function ValidateField_movilizacion_hora_salida(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->movilizacion_hora_salida, $this->field_config['movilizacion_hora_salida']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['movilizacion_hora_salida']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['movilizacion_hora_salida']['time_sep']) ; 
          if (trim($this->movilizacion_hora_salida) != "")  
          { 
              if ($teste_validade->Hora($this->movilizacion_hora_salida, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Hora de Salida; " ; 
                  if (!isset($Campos_Erros['movilizacion_hora_salida']))
                  {
                      $Campos_Erros['movilizacion_hora_salida'] = array();
                  }
                  $Campos_Erros['movilizacion_hora_salida'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_hora_salida']) || !is_array($this->NM_ajax_info['errList']['movilizacion_hora_salida']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_hora_salida'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_hora_salida'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_hora_salida

    function ValidateField_movilizacion_total_combustible(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->movilizacion_total_combustible == "")  
      { 
          $this->movilizacion_total_combustible = 0;
          $this->sc_force_zero[] = 'movilizacion_total_combustible';
      } 
      if (!empty($this->field_config['movilizacion_total_combustible']['symbol_dec']))
      {
          $this->sc_remove_currency($this->movilizacion_total_combustible, $this->field_config['movilizacion_total_combustible']['symbol_dec'], $this->field_config['movilizacion_total_combustible']['symbol_grp'], $this->field_config['movilizacion_total_combustible']['symbol_mon']); 
          nm_limpa_valor($this->movilizacion_total_combustible, $this->field_config['movilizacion_total_combustible']['symbol_dec'], $this->field_config['movilizacion_total_combustible']['symbol_grp']) ; 
          if ('.' == substr($this->movilizacion_total_combustible, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->movilizacion_total_combustible, 1)))
              {
                  $this->movilizacion_total_combustible = '';
              }
              else
              {
                  $this->movilizacion_total_combustible = '0' . $this->movilizacion_total_combustible;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->movilizacion_total_combustible != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->movilizacion_total_combustible) > $iTestSize)  
              { 
                  $Campos_Crit .= "Costo Total de Combustible: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['movilizacion_total_combustible']))
                  {
                      $Campos_Erros['movilizacion_total_combustible'] = array();
                  }
                  $Campos_Erros['movilizacion_total_combustible'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_total_combustible']) || !is_array($this->NM_ajax_info['errList']['movilizacion_total_combustible']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_total_combustible'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_total_combustible'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->movilizacion_total_combustible, 10, 2, -0, 999999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Costo Total de Combustible; " ; 
                  if (!isset($Campos_Erros['movilizacion_total_combustible']))
                  {
                      $Campos_Erros['movilizacion_total_combustible'] = array();
                  }
                  $Campos_Erros['movilizacion_total_combustible'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_total_combustible']) || !is_array($this->NM_ajax_info['errList']['movilizacion_total_combustible']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_total_combustible'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_total_combustible'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_total_combustible

    function ValidateField_movilizacion_hora_llegada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->movilizacion_hora_llegada, $this->field_config['movilizacion_hora_llegada']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['movilizacion_hora_llegada']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['movilizacion_hora_llegada']['time_sep']) ; 
          if (trim($this->movilizacion_hora_llegada) != "")  
          { 
              if ($teste_validade->Hora($this->movilizacion_hora_llegada, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Hora de Llegada; " ; 
                  if (!isset($Campos_Erros['movilizacion_hora_llegada']))
                  {
                      $Campos_Erros['movilizacion_hora_llegada'] = array();
                  }
                  $Campos_Erros['movilizacion_hora_llegada'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_hora_llegada']) || !is_array($this->NM_ajax_info['errList']['movilizacion_hora_llegada']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_hora_llegada'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_hora_llegada'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_hora_llegada

    function ValidateField_movilizacion_total_galones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->movilizacion_total_galones == "")  
      { 
          $this->movilizacion_total_galones = 0;
          $this->sc_force_zero[] = 'movilizacion_total_galones';
      } 
      if (!empty($this->field_config['movilizacion_total_galones']['symbol_dec']))
      {
          $this->sc_remove_currency($this->movilizacion_total_galones, $this->field_config['movilizacion_total_galones']['symbol_dec'], $this->field_config['movilizacion_total_galones']['symbol_grp'], $this->field_config['movilizacion_total_galones']['symbol_mon']); 
          nm_limpa_valor($this->movilizacion_total_galones, $this->field_config['movilizacion_total_galones']['symbol_dec'], $this->field_config['movilizacion_total_galones']['symbol_grp']) ; 
          if ('.' == substr($this->movilizacion_total_galones, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->movilizacion_total_galones, 1)))
              {
                  $this->movilizacion_total_galones = '';
              }
              else
              {
                  $this->movilizacion_total_galones = '0' . $this->movilizacion_total_galones;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->movilizacion_total_galones != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->movilizacion_total_galones) > $iTestSize)  
              { 
                  $Campos_Crit .= "Total Galones Usados: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['movilizacion_total_galones']))
                  {
                      $Campos_Erros['movilizacion_total_galones'] = array();
                  }
                  $Campos_Erros['movilizacion_total_galones'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_total_galones']) || !is_array($this->NM_ajax_info['errList']['movilizacion_total_galones']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_total_galones'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_total_galones'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->movilizacion_total_galones, 10, 2, -0, 999999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Total Galones Usados; " ; 
                  if (!isset($Campos_Erros['movilizacion_total_galones']))
                  {
                      $Campos_Erros['movilizacion_total_galones'] = array();
                  }
                  $Campos_Erros['movilizacion_total_galones'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_total_galones']) || !is_array($this->NM_ajax_info['errList']['movilizacion_total_galones']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_total_galones'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_total_galones'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_total_galones

    function ValidateField_movilizacion_km_salida(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->movilizacion_km_salida == "")  
      { 
          $this->movilizacion_km_salida = 0;
          $this->sc_force_zero[] = 'movilizacion_km_salida';
      } 
      nm_limpa_numero($this->movilizacion_km_salida, $this->field_config['movilizacion_km_salida']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->movilizacion_km_salida != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->movilizacion_km_salida) > $iTestSize)  
              { 
                  $Campos_Crit .= "Kilometraje de Salida: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['movilizacion_km_salida']))
                  {
                      $Campos_Erros['movilizacion_km_salida'] = array();
                  }
                  $Campos_Erros['movilizacion_km_salida'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_km_salida']) || !is_array($this->NM_ajax_info['errList']['movilizacion_km_salida']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_km_salida'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_km_salida'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->movilizacion_km_salida, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Kilometraje de Salida; " ; 
                  if (!isset($Campos_Erros['movilizacion_km_salida']))
                  {
                      $Campos_Erros['movilizacion_km_salida'] = array();
                  }
                  $Campos_Erros['movilizacion_km_salida'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_km_salida']) || !is_array($this->NM_ajax_info['errList']['movilizacion_km_salida']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_km_salida'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_km_salida'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_km_salida

    function ValidateField_movilizacion_cant_km_adicional(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->movilizacion_cant_km_adicional == "")  
      { 
          $this->movilizacion_cant_km_adicional = 0;
          $this->sc_force_zero[] = 'movilizacion_cant_km_adicional';
      } 
      nm_limpa_numero($this->movilizacion_cant_km_adicional, $this->field_config['movilizacion_cant_km_adicional']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->movilizacion_cant_km_adicional != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->movilizacion_cant_km_adicional) > $iTestSize)  
              { 
                  $Campos_Crit .= "Cantidad de Kilometraje Adicional: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['movilizacion_cant_km_adicional']))
                  {
                      $Campos_Erros['movilizacion_cant_km_adicional'] = array();
                  }
                  $Campos_Erros['movilizacion_cant_km_adicional'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_cant_km_adicional']) || !is_array($this->NM_ajax_info['errList']['movilizacion_cant_km_adicional']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_cant_km_adicional'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_cant_km_adicional'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->movilizacion_cant_km_adicional, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Cantidad de Kilometraje Adicional; " ; 
                  if (!isset($Campos_Erros['movilizacion_cant_km_adicional']))
                  {
                      $Campos_Erros['movilizacion_cant_km_adicional'] = array();
                  }
                  $Campos_Erros['movilizacion_cant_km_adicional'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_cant_km_adicional']) || !is_array($this->NM_ajax_info['errList']['movilizacion_cant_km_adicional']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_cant_km_adicional'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_cant_km_adicional'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_cant_km_adicional

    function ValidateField_movilizacion_km_llegada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->movilizacion_km_llegada == "")  
      { 
          $this->movilizacion_km_llegada = 0;
          $this->sc_force_zero[] = 'movilizacion_km_llegada';
      } 
      nm_limpa_numero($this->movilizacion_km_llegada, $this->field_config['movilizacion_km_llegada']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->movilizacion_km_llegada != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->movilizacion_km_llegada) > $iTestSize)  
              { 
                  $Campos_Crit .= "Kilometraje de Llegada: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['movilizacion_km_llegada']))
                  {
                      $Campos_Erros['movilizacion_km_llegada'] = array();
                  }
                  $Campos_Erros['movilizacion_km_llegada'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_km_llegada']) || !is_array($this->NM_ajax_info['errList']['movilizacion_km_llegada']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_km_llegada'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_km_llegada'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->movilizacion_km_llegada, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Kilometraje de Llegada; " ; 
                  if (!isset($Campos_Erros['movilizacion_km_llegada']))
                  {
                      $Campos_Erros['movilizacion_km_llegada'] = array();
                  }
                  $Campos_Erros['movilizacion_km_llegada'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_km_llegada']) || !is_array($this->NM_ajax_info['errList']['movilizacion_km_llegada']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_km_llegada'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_km_llegada'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_km_llegada

    function ValidateField_movilizacion_excedente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->movilizacion_excedente == "")  
      { 
          $this->movilizacion_excedente = 0;
          $this->sc_force_zero[] = 'movilizacion_excedente';
      } 
      nm_limpa_numero($this->movilizacion_excedente, $this->field_config['movilizacion_excedente']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->movilizacion_excedente != '')  
          { 
              $iTestSize = 12;
              if ('-' == substr($this->movilizacion_excedente, 0, 1))
              {
                  $iTestSize++;
              }
              elseif ('-' == substr($this->movilizacion_excedente, -1))
              {
                  $iTestSize++;
                  $this->movilizacion_excedente = '-' . substr($this->movilizacion_excedente, 0, -1);
              }
              if (strlen($this->movilizacion_excedente) > $iTestSize)  
              { 
                  $Campos_Crit .= "Excedente: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['movilizacion_excedente']))
                  {
                      $Campos_Erros['movilizacion_excedente'] = array();
                  }
                  $Campos_Erros['movilizacion_excedente'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_excedente']) || !is_array($this->NM_ajax_info['errList']['movilizacion_excedente']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_excedente'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_excedente'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->movilizacion_excedente, 12, 0, 0, 0, "S") == false)  
              { 
                  $Campos_Crit .= "Excedente; " ; 
                  if (!isset($Campos_Erros['movilizacion_excedente']))
                  {
                      $Campos_Erros['movilizacion_excedente'] = array();
                  }
                  $Campos_Erros['movilizacion_excedente'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_excedente']) || !is_array($this->NM_ajax_info['errList']['movilizacion_excedente']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_excedente'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_excedente'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_excedente

    function ValidateField_movilizacion_recorrido_vehiculo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->movilizacion_recorrido_vehiculo == "")  
      { 
          $this->movilizacion_recorrido_vehiculo = 0;
          $this->sc_force_zero[] = 'movilizacion_recorrido_vehiculo';
      } 
      nm_limpa_numero($this->movilizacion_recorrido_vehiculo, $this->field_config['movilizacion_recorrido_vehiculo']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->movilizacion_recorrido_vehiculo != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->movilizacion_recorrido_vehiculo) > $iTestSize)  
              { 
                  $Campos_Crit .= "Kilometros Recorridos por el Vehículo: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['movilizacion_recorrido_vehiculo']))
                  {
                      $Campos_Erros['movilizacion_recorrido_vehiculo'] = array();
                  }
                  $Campos_Erros['movilizacion_recorrido_vehiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_recorrido_vehiculo']) || !is_array($this->NM_ajax_info['errList']['movilizacion_recorrido_vehiculo']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_recorrido_vehiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_recorrido_vehiculo'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->movilizacion_recorrido_vehiculo, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Kilometros Recorridos por el Vehículo; " ; 
                  if (!isset($Campos_Erros['movilizacion_recorrido_vehiculo']))
                  {
                      $Campos_Erros['movilizacion_recorrido_vehiculo'] = array();
                  }
                  $Campos_Erros['movilizacion_recorrido_vehiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_recorrido_vehiculo']) || !is_array($this->NM_ajax_info['errList']['movilizacion_recorrido_vehiculo']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_recorrido_vehiculo'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_recorrido_vehiculo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_recorrido_vehiculo

    function ValidateField_movilizacion_total_km_recorrido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->movilizacion_total_km_recorrido == "")  
      { 
          $this->movilizacion_total_km_recorrido = 0;
          $this->sc_force_zero[] = 'movilizacion_total_km_recorrido';
      } 
      nm_limpa_numero($this->movilizacion_total_km_recorrido, $this->field_config['movilizacion_total_km_recorrido']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->movilizacion_total_km_recorrido != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->movilizacion_total_km_recorrido) > $iTestSize)  
              { 
                  $Campos_Crit .= "Total Kilometraje Recorrido: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['movilizacion_total_km_recorrido']))
                  {
                      $Campos_Erros['movilizacion_total_km_recorrido'] = array();
                  }
                  $Campos_Erros['movilizacion_total_km_recorrido'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_total_km_recorrido']) || !is_array($this->NM_ajax_info['errList']['movilizacion_total_km_recorrido']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_total_km_recorrido'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_total_km_recorrido'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->movilizacion_total_km_recorrido, 12, 0, -0, 999999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Total Kilometraje Recorrido; " ; 
                  if (!isset($Campos_Erros['movilizacion_total_km_recorrido']))
                  {
                      $Campos_Erros['movilizacion_total_km_recorrido'] = array();
                  }
                  $Campos_Erros['movilizacion_total_km_recorrido'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_total_km_recorrido']) || !is_array($this->NM_ajax_info['errList']['movilizacion_total_km_recorrido']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_total_km_recorrido'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_total_km_recorrido'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_total_km_recorrido

    function ValidateField_movilizacion_costo_galon(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->movilizacion_costo_galon == "")  
      { 
          $this->movilizacion_costo_galon = 0;
          $this->sc_force_zero[] = 'movilizacion_costo_galon';
      } 
      if (!empty($this->field_config['movilizacion_costo_galon']['symbol_dec']))
      {
          $this->sc_remove_currency($this->movilizacion_costo_galon, $this->field_config['movilizacion_costo_galon']['symbol_dec'], $this->field_config['movilizacion_costo_galon']['symbol_grp'], $this->field_config['movilizacion_costo_galon']['symbol_mon']); 
          nm_limpa_valor($this->movilizacion_costo_galon, $this->field_config['movilizacion_costo_galon']['symbol_dec'], $this->field_config['movilizacion_costo_galon']['symbol_grp']) ; 
          if ('.' == substr($this->movilizacion_costo_galon, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->movilizacion_costo_galon, 1)))
              {
                  $this->movilizacion_costo_galon = '';
              }
              else
              {
                  $this->movilizacion_costo_galon = '0' . $this->movilizacion_costo_galon;
              }
          }
      }
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->movilizacion_costo_galon != '')  
          { 
              $iTestSize = 4;
              if (strlen($this->movilizacion_costo_galon) > $iTestSize)  
              { 
                  $Campos_Crit .= "Valor del Combustible: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['movilizacion_costo_galon']))
                  {
                      $Campos_Erros['movilizacion_costo_galon'] = array();
                  }
                  $Campos_Erros['movilizacion_costo_galon'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_costo_galon']) || !is_array($this->NM_ajax_info['errList']['movilizacion_costo_galon']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_costo_galon'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_costo_galon'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->movilizacion_costo_galon, 1, 2, -0, 999, "N") == false)  
              { 
                  $Campos_Crit .= "Valor del Combustible; " ; 
                  if (!isset($Campos_Erros['movilizacion_costo_galon']))
                  {
                      $Campos_Erros['movilizacion_costo_galon'] = array();
                  }
                  $Campos_Erros['movilizacion_costo_galon'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['movilizacion_costo_galon']) || !is_array($this->NM_ajax_info['errList']['movilizacion_costo_galon']))
                  {
                      $this->NM_ajax_info['errList']['movilizacion_costo_galon'] = array();
                  }
                  $this->NM_ajax_info['errList']['movilizacion_costo_galon'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_movilizacion_costo_galon

    function ValidateField_detalle_movilizacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->detalle_movilizacion) != "")  
          { 
          } 
      } 
    } // ValidateField_detalle_movilizacion

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['id_movilizacion'] = $this->id_movilizacion;
    $this->nmgp_dados_form['movilizacion_fecha'] = (strlen(trim($this->movilizacion_fecha)) > 19) ? str_replace(".", ":", $this->movilizacion_fecha) : trim($this->movilizacion_fecha);
    $this->nmgp_dados_form['idusuario'] = $this->idusuario;
    $this->nmgp_dados_form['idvehiculo'] = $this->idvehiculo;
    $this->nmgp_dados_form['movilizacion_funcionario'] = $this->movilizacion_funcionario;
    $this->nmgp_dados_form['movilizacion_hora_salida'] = (strlen(trim($this->movilizacion_hora_salida)) > 19) ? str_replace(".", ":", $this->movilizacion_hora_salida) : trim($this->movilizacion_hora_salida);
    $this->nmgp_dados_form['movilizacion_total_combustible'] = $this->movilizacion_total_combustible;
    $this->nmgp_dados_form['movilizacion_hora_llegada'] = (strlen(trim($this->movilizacion_hora_llegada)) > 19) ? str_replace(".", ":", $this->movilizacion_hora_llegada) : trim($this->movilizacion_hora_llegada);
    $this->nmgp_dados_form['movilizacion_total_galones'] = $this->movilizacion_total_galones;
    $this->nmgp_dados_form['movilizacion_km_salida'] = $this->movilizacion_km_salida;
    $this->nmgp_dados_form['movilizacion_cant_km_adicional'] = $this->movilizacion_cant_km_adicional;
    $this->nmgp_dados_form['movilizacion_km_llegada'] = $this->movilizacion_km_llegada;
    $this->nmgp_dados_form['movilizacion_excedente'] = $this->movilizacion_excedente;
    $this->nmgp_dados_form['movilizacion_recorrido_vehiculo'] = $this->movilizacion_recorrido_vehiculo;
    $this->nmgp_dados_form['movilizacion_total_km_recorrido'] = $this->movilizacion_total_km_recorrido;
    $this->nmgp_dados_form['movilizacion_costo_galon'] = $this->movilizacion_costo_galon;
    $this->nmgp_dados_form['detalle_movilizacion'] = $this->detalle_movilizacion;
    $this->nmgp_dados_form['movilizacion_ruta'] = $this->movilizacion_ruta;
    $this->nmgp_dados_form['km_galon'] = $this->km_galon;
    $this->nmgp_dados_form['libre'] = $this->libre;
    $this->nmgp_dados_form['libre2'] = $this->libre2;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->id_movilizacion, $this->field_config['id_movilizacion']['symbol_grp']) ; 
      nm_limpa_data($this->movilizacion_fecha, $this->field_config['movilizacion_fecha']['date_sep']) ; 
      nm_limpa_numero($this->idvehiculo, $this->field_config['idvehiculo']['symbol_grp']) ; 
      nm_limpa_hora($this->movilizacion_hora_salida, $this->field_config['movilizacion_hora_salida']['time_sep']) ; 
      if (!empty($this->field_config['movilizacion_total_combustible']['symbol_dec']))
      {
         $this->sc_remove_currency($this->movilizacion_total_combustible, $this->field_config['movilizacion_total_combustible']['symbol_dec'], $this->field_config['movilizacion_total_combustible']['symbol_grp'], $this->field_config['movilizacion_total_combustible']['symbol_mon']);
         nm_limpa_valor($this->movilizacion_total_combustible, $this->field_config['movilizacion_total_combustible']['symbol_dec'], $this->field_config['movilizacion_total_combustible']['symbol_grp']);
      }
      nm_limpa_hora($this->movilizacion_hora_llegada, $this->field_config['movilizacion_hora_llegada']['time_sep']) ; 
      if (!empty($this->field_config['movilizacion_total_galones']['symbol_dec']))
      {
         $this->sc_remove_currency($this->movilizacion_total_galones, $this->field_config['movilizacion_total_galones']['symbol_dec'], $this->field_config['movilizacion_total_galones']['symbol_grp'], $this->field_config['movilizacion_total_galones']['symbol_mon']);
         nm_limpa_valor($this->movilizacion_total_galones, $this->field_config['movilizacion_total_galones']['symbol_dec'], $this->field_config['movilizacion_total_galones']['symbol_grp']);
      }
      nm_limpa_numero($this->movilizacion_km_salida, $this->field_config['movilizacion_km_salida']['symbol_grp']) ; 
      nm_limpa_numero($this->movilizacion_cant_km_adicional, $this->field_config['movilizacion_cant_km_adicional']['symbol_grp']) ; 
      nm_limpa_numero($this->movilizacion_km_llegada, $this->field_config['movilizacion_km_llegada']['symbol_grp']) ; 
      nm_limpa_numero($this->movilizacion_excedente, $this->field_config['movilizacion_excedente']['symbol_grp']) ; 
      nm_limpa_numero($this->movilizacion_recorrido_vehiculo, $this->field_config['movilizacion_recorrido_vehiculo']['symbol_grp']) ; 
      nm_limpa_numero($this->movilizacion_total_km_recorrido, $this->field_config['movilizacion_total_km_recorrido']['symbol_grp']) ; 
      if (!empty($this->field_config['movilizacion_costo_galon']['symbol_dec']))
      {
         $this->sc_remove_currency($this->movilizacion_costo_galon, $this->field_config['movilizacion_costo_galon']['symbol_dec'], $this->field_config['movilizacion_costo_galon']['symbol_grp'], $this->field_config['movilizacion_costo_galon']['symbol_mon']);
         nm_limpa_valor($this->movilizacion_costo_galon, $this->field_config['movilizacion_costo_galon']['symbol_dec'], $this->field_config['movilizacion_costo_galon']['symbol_grp']);
      }
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "id_movilizacion")
      {
          nm_limpa_numero($this->id_movilizacion, $this->field_config['id_movilizacion']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idvehiculo")
      {
          nm_limpa_numero($this->idvehiculo, $this->field_config['idvehiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "movilizacion_total_combustible")
      {
          if (!empty($this->field_config['movilizacion_total_combustible']['symbol_dec']))
          {
             $this->sc_remove_currency($this->movilizacion_total_combustible, $this->field_config['movilizacion_total_combustible']['symbol_dec'], $this->field_config['movilizacion_total_combustible']['symbol_grp'], $this->field_config['movilizacion_total_combustible']['symbol_mon']);
             nm_limpa_valor($this->movilizacion_total_combustible, $this->field_config['movilizacion_total_combustible']['symbol_dec'], $this->field_config['movilizacion_total_combustible']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "movilizacion_total_galones")
      {
          if (!empty($this->field_config['movilizacion_total_galones']['symbol_dec']))
          {
             $this->sc_remove_currency($this->movilizacion_total_galones, $this->field_config['movilizacion_total_galones']['symbol_dec'], $this->field_config['movilizacion_total_galones']['symbol_grp'], $this->field_config['movilizacion_total_galones']['symbol_mon']);
             nm_limpa_valor($this->movilizacion_total_galones, $this->field_config['movilizacion_total_galones']['symbol_dec'], $this->field_config['movilizacion_total_galones']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "movilizacion_km_salida")
      {
          nm_limpa_numero($this->movilizacion_km_salida, $this->field_config['movilizacion_km_salida']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "movilizacion_cant_km_adicional")
      {
          nm_limpa_numero($this->movilizacion_cant_km_adicional, $this->field_config['movilizacion_cant_km_adicional']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "movilizacion_km_llegada")
      {
          nm_limpa_numero($this->movilizacion_km_llegada, $this->field_config['movilizacion_km_llegada']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "movilizacion_excedente")
      {
          nm_limpa_numero($this->movilizacion_excedente, $this->field_config['movilizacion_excedente']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "movilizacion_recorrido_vehiculo")
      {
          nm_limpa_numero($this->movilizacion_recorrido_vehiculo, $this->field_config['movilizacion_recorrido_vehiculo']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "movilizacion_total_km_recorrido")
      {
          nm_limpa_numero($this->movilizacion_total_km_recorrido, $this->field_config['movilizacion_total_km_recorrido']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "movilizacion_costo_galon")
      {
          if (!empty($this->field_config['movilizacion_costo_galon']['symbol_dec']))
          {
             $this->sc_remove_currency($this->movilizacion_costo_galon, $this->field_config['movilizacion_costo_galon']['symbol_dec'], $this->field_config['movilizacion_costo_galon']['symbol_grp'], $this->field_config['movilizacion_costo_galon']['symbol_mon']);
             nm_limpa_valor($this->movilizacion_costo_galon, $this->field_config['movilizacion_costo_galon']['symbol_dec'], $this->field_config['movilizacion_costo_galon']['symbol_grp']);
          }
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->id_movilizacion || (!empty($format_fields) && isset($format_fields['id_movilizacion'])))
      {
          nmgp_Form_Num_Val($this->id_movilizacion, $this->field_config['id_movilizacion']['symbol_grp'], $this->field_config['id_movilizacion']['symbol_dec'], "0", "S", $this->field_config['id_movilizacion']['format_neg'], "", "", "-", $this->field_config['id_movilizacion']['symbol_fmt']) ; 
      }
      if ((!empty($this->movilizacion_fecha) && 'null' != $this->movilizacion_fecha) || (!empty($format_fields) && isset($format_fields['movilizacion_fecha'])))
      {
          nm_volta_data($this->movilizacion_fecha, $this->field_config['movilizacion_fecha']['date_format']) ; 
          nmgp_Form_Datas($this->movilizacion_fecha, $this->field_config['movilizacion_fecha']['date_format'], $this->field_config['movilizacion_fecha']['date_sep']) ;  
      }
      elseif ('null' == $this->movilizacion_fecha || '' == $this->movilizacion_fecha)
      {
          $this->movilizacion_fecha = '';
      }
      if ('' !== $this->idvehiculo || (!empty($format_fields) && isset($format_fields['idvehiculo'])))
      {
          nmgp_Form_Num_Val($this->idvehiculo, $this->field_config['idvehiculo']['symbol_grp'], $this->field_config['idvehiculo']['symbol_dec'], "0", "S", $this->field_config['idvehiculo']['format_neg'], "", "", "-", $this->field_config['idvehiculo']['symbol_fmt']) ; 
      }
      if ((!empty($this->movilizacion_hora_salida) && 'null' != $this->movilizacion_hora_salida) || (!empty($format_fields) && isset($format_fields['movilizacion_hora_salida'])))
      {
          nm_volta_hora($this->movilizacion_hora_salida, $this->field_config['movilizacion_hora_salida']['date_format']) ; 
          nmgp_Form_Hora($this->movilizacion_hora_salida, $this->field_config['movilizacion_hora_salida']['date_format'], $this->field_config['movilizacion_hora_salida']['time_sep']) ;  
      }
      elseif ('null' == $this->movilizacion_hora_salida || '' == $this->movilizacion_hora_salida)
      {
          $this->movilizacion_hora_salida = '';
      }
      if ('' !== $this->movilizacion_total_combustible || (!empty($format_fields) && isset($format_fields['movilizacion_total_combustible'])))
      {
          nmgp_Form_Num_Val($this->movilizacion_total_combustible, $this->field_config['movilizacion_total_combustible']['symbol_grp'], $this->field_config['movilizacion_total_combustible']['symbol_dec'], "2", "S", $this->field_config['movilizacion_total_combustible']['format_neg'], "", "", "-", $this->field_config['movilizacion_total_combustible']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['movilizacion_total_combustible']['symbol_mon'];
          $this->sc_add_currency($this->movilizacion_total_combustible, $sMonSymb, $this->field_config['movilizacion_total_combustible']['format_pos']); 
      }
      if ((!empty($this->movilizacion_hora_llegada) && 'null' != $this->movilizacion_hora_llegada) || (!empty($format_fields) && isset($format_fields['movilizacion_hora_llegada'])))
      {
          nm_volta_hora($this->movilizacion_hora_llegada, $this->field_config['movilizacion_hora_llegada']['date_format']) ; 
          nmgp_Form_Hora($this->movilizacion_hora_llegada, $this->field_config['movilizacion_hora_llegada']['date_format'], $this->field_config['movilizacion_hora_llegada']['time_sep']) ;  
      }
      elseif ('null' == $this->movilizacion_hora_llegada || '' == $this->movilizacion_hora_llegada)
      {
          $this->movilizacion_hora_llegada = '';
      }
      if ('' !== $this->movilizacion_total_galones || (!empty($format_fields) && isset($format_fields['movilizacion_total_galones'])))
      {
          nmgp_Form_Num_Val($this->movilizacion_total_galones, $this->field_config['movilizacion_total_galones']['symbol_grp'], $this->field_config['movilizacion_total_galones']['symbol_dec'], "2", "S", $this->field_config['movilizacion_total_galones']['format_neg'], "", "", "-", $this->field_config['movilizacion_total_galones']['symbol_fmt']) ; 
      }
      if ('' !== $this->movilizacion_km_salida || (!empty($format_fields) && isset($format_fields['movilizacion_km_salida'])))
      {
          nmgp_Form_Num_Val($this->movilizacion_km_salida, $this->field_config['movilizacion_km_salida']['symbol_grp'], $this->field_config['movilizacion_km_salida']['symbol_dec'], "0", "S", $this->field_config['movilizacion_km_salida']['format_neg'], "", "", "-", $this->field_config['movilizacion_km_salida']['symbol_fmt']) ; 
      }
      if ('' !== $this->movilizacion_cant_km_adicional || (!empty($format_fields) && isset($format_fields['movilizacion_cant_km_adicional'])))
      {
          nmgp_Form_Num_Val($this->movilizacion_cant_km_adicional, $this->field_config['movilizacion_cant_km_adicional']['symbol_grp'], $this->field_config['movilizacion_cant_km_adicional']['symbol_dec'], "0", "S", $this->field_config['movilizacion_cant_km_adicional']['format_neg'], "", "", "-", $this->field_config['movilizacion_cant_km_adicional']['symbol_fmt']) ; 
      }
      if ('' !== $this->movilizacion_km_llegada || (!empty($format_fields) && isset($format_fields['movilizacion_km_llegada'])))
      {
          nmgp_Form_Num_Val($this->movilizacion_km_llegada, $this->field_config['movilizacion_km_llegada']['symbol_grp'], $this->field_config['movilizacion_km_llegada']['symbol_dec'], "0", "S", $this->field_config['movilizacion_km_llegada']['format_neg'], "", "", "-", $this->field_config['movilizacion_km_llegada']['symbol_fmt']) ; 
      }
      if ('' !== $this->movilizacion_excedente || (!empty($format_fields) && isset($format_fields['movilizacion_excedente'])))
      {
          nmgp_Form_Num_Val($this->movilizacion_excedente, $this->field_config['movilizacion_excedente']['symbol_grp'], $this->field_config['movilizacion_excedente']['symbol_dec'], "0", "S", $this->field_config['movilizacion_excedente']['format_neg'], "", "", "-", $this->field_config['movilizacion_excedente']['symbol_fmt']) ; 
      }
      if ('' !== $this->movilizacion_recorrido_vehiculo || (!empty($format_fields) && isset($format_fields['movilizacion_recorrido_vehiculo'])))
      {
          nmgp_Form_Num_Val($this->movilizacion_recorrido_vehiculo, $this->field_config['movilizacion_recorrido_vehiculo']['symbol_grp'], $this->field_config['movilizacion_recorrido_vehiculo']['symbol_dec'], "0", "S", $this->field_config['movilizacion_recorrido_vehiculo']['format_neg'], "", "", "-", $this->field_config['movilizacion_recorrido_vehiculo']['symbol_fmt']) ; 
      }
      if ('' !== $this->movilizacion_total_km_recorrido || (!empty($format_fields) && isset($format_fields['movilizacion_total_km_recorrido'])))
      {
          nmgp_Form_Num_Val($this->movilizacion_total_km_recorrido, $this->field_config['movilizacion_total_km_recorrido']['symbol_grp'], $this->field_config['movilizacion_total_km_recorrido']['symbol_dec'], "0", "S", $this->field_config['movilizacion_total_km_recorrido']['format_neg'], "", "", "-", $this->field_config['movilizacion_total_km_recorrido']['symbol_fmt']) ; 
      }
      if ('' !== $this->movilizacion_costo_galon || (!empty($format_fields) && isset($format_fields['movilizacion_costo_galon'])))
      {
          nmgp_Form_Num_Val($this->movilizacion_costo_galon, $this->field_config['movilizacion_costo_galon']['symbol_grp'], $this->field_config['movilizacion_costo_galon']['symbol_dec'], "2", "S", $this->field_config['movilizacion_costo_galon']['format_neg'], "", "", "-", $this->field_config['movilizacion_costo_galon']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['movilizacion_fecha']['date_format'];
      if ($this->movilizacion_fecha != "")  
      { 
          nm_conv_data($this->movilizacion_fecha, $this->field_config['movilizacion_fecha']['date_format']) ; 
          $this->movilizacion_fecha_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->movilizacion_fecha_hora = substr($this->movilizacion_fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->movilizacion_fecha_hora = substr($this->movilizacion_fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->movilizacion_fecha_hora = substr($this->movilizacion_fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->movilizacion_fecha_hora = substr($this->movilizacion_fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->movilizacion_fecha_hora = substr($this->movilizacion_fecha_hora, 0, -4);
          }
      } 
      if ($this->movilizacion_fecha == "" && $use_null)  
      { 
          $this->movilizacion_fecha = "null" ; 
      } 
      $this->field_config['movilizacion_fecha']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['movilizacion_hora_salida']['date_format'];
      if ($this->movilizacion_hora_salida != "")  
      { 
          $this->movilizacion_hora_salida_hora = $this->movilizacion_hora_salida;
          $this->movilizacion_hora_salida = "1900-01-01";
          nm_conv_hora($this->movilizacion_hora_salida_hora, $this->field_config['movilizacion_hora_salida']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->movilizacion_hora_salida_hora = substr($this->movilizacion_hora_salida_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->movilizacion_hora_salida_hora = substr($this->movilizacion_hora_salida_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->movilizacion_hora_salida_hora = substr($this->movilizacion_hora_salida_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->movilizacion_hora_salida_hora = substr($this->movilizacion_hora_salida_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->movilizacion_hora_salida_hora = substr($this->movilizacion_hora_salida_hora, 0, -4);
          }
          $this->movilizacion_hora_salida = $this->movilizacion_hora_salida_hora;
      } 
      if ($this->movilizacion_hora_salida == "" && $use_null)  
      { 
          $this->movilizacion_hora_salida = "null" ; 
      } 
      $this->field_config['movilizacion_hora_salida']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['movilizacion_hora_llegada']['date_format'];
      if ($this->movilizacion_hora_llegada != "")  
      { 
          $this->movilizacion_hora_llegada_hora = $this->movilizacion_hora_llegada;
          $this->movilizacion_hora_llegada = "1900-01-01";
          nm_conv_hora($this->movilizacion_hora_llegada_hora, $this->field_config['movilizacion_hora_llegada']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->movilizacion_hora_llegada_hora = substr($this->movilizacion_hora_llegada_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->movilizacion_hora_llegada_hora = substr($this->movilizacion_hora_llegada_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->movilizacion_hora_llegada_hora = substr($this->movilizacion_hora_llegada_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->movilizacion_hora_llegada_hora = substr($this->movilizacion_hora_llegada_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->movilizacion_hora_llegada_hora = substr($this->movilizacion_hora_llegada_hora, 0, -4);
          }
          $this->movilizacion_hora_llegada = $this->movilizacion_hora_llegada_hora;
      } 
      if ($this->movilizacion_hora_llegada == "" && $use_null)  
      { 
          $this->movilizacion_hora_llegada = "null" ; 
      } 
      $this->field_config['movilizacion_hora_llegada']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_id_movilizacion();
          $this->ajax_return_values_movilizacion_fecha();
          $this->ajax_return_values_idusuario();
          $this->ajax_return_values_idvehiculo();
          $this->ajax_return_values_movilizacion_funcionario();
          $this->ajax_return_values_movilizacion_hora_salida();
          $this->ajax_return_values_movilizacion_total_combustible();
          $this->ajax_return_values_movilizacion_hora_llegada();
          $this->ajax_return_values_movilizacion_total_galones();
          $this->ajax_return_values_movilizacion_km_salida();
          $this->ajax_return_values_movilizacion_cant_km_adicional();
          $this->ajax_return_values_movilizacion_km_llegada();
          $this->ajax_return_values_movilizacion_excedente();
          $this->ajax_return_values_movilizacion_recorrido_vehiculo();
          $this->ajax_return_values_movilizacion_total_km_recorrido();
          $this->ajax_return_values_movilizacion_costo_galon();
          $this->ajax_return_values_detalle_movilizacion();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_movilizacion']['keyVal'] = form_movilizacion_impresion_mob_pack_protect_string($this->nmgp_dados_form['id_movilizacion']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['foreign_key']['id_movilizacion'] = $this->nmgp_dados_form['id_movilizacion'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['where_filter'] = "Id_Movilizacion = " . $this->nmgp_dados_form['id_movilizacion'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['where_detal']  = "Id_Movilizacion = " . $this->nmgp_dados_form['id_movilizacion'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['total']);
              foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob'] as $i => $v)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion'][$i] = $v;
              }
              if (isset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['total']))
              {
                  unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['total']);
              }
          }
   } // ajax_return_values

          //----- id_movilizacion
   function ajax_return_values_id_movilizacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_movilizacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_movilizacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_movilizacion'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_fecha
   function ajax_return_values_movilizacion_fecha($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_fecha", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_fecha);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_fecha'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- idusuario
   function ajax_return_values_idusuario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idusuario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idusuario);
              $aLookup = array();
              $this->_tmp_lookup_idusuario = $this->idusuario;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'] = array(); 
}
$aLookup[] = array(form_movilizacion_impresion_mob_pack_protect_string('') => form_movilizacion_impresion_mob_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_movilizacion = $this->id_movilizacion;
   $old_value_movilizacion_fecha = $this->movilizacion_fecha;
   $old_value_idvehiculo = $this->idvehiculo;
   $old_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $old_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $old_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $old_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $old_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $old_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $old_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $old_value_movilizacion_excedente = $this->movilizacion_excedente;
   $old_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $old_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $old_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_movilizacion = $this->id_movilizacion;
   $unformatted_value_movilizacion_fecha = $this->movilizacion_fecha;
   $unformatted_value_idvehiculo = $this->idvehiculo;
   $unformatted_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $unformatted_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $unformatted_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $unformatted_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $unformatted_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $unformatted_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $unformatted_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $unformatted_value_movilizacion_excedente = $this->movilizacion_excedente;
   $unformatted_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $unformatted_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $unformatted_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;

   $nm_comando = "SELECT idusuario, concat(usuario_apellidos,\" \",usuario_nombres)  FROM usuario, cargo WHERE  usuario.usuario_cargo = cargo.idcargo AND cargo.idcargo= 1 ORDER BY usuario_apellidos, usuario_nombres";

   $this->id_movilizacion = $old_value_id_movilizacion;
   $this->movilizacion_fecha = $old_value_movilizacion_fecha;
   $this->idvehiculo = $old_value_idvehiculo;
   $this->movilizacion_hora_salida = $old_value_movilizacion_hora_salida;
   $this->movilizacion_total_combustible = $old_value_movilizacion_total_combustible;
   $this->movilizacion_hora_llegada = $old_value_movilizacion_hora_llegada;
   $this->movilizacion_total_galones = $old_value_movilizacion_total_galones;
   $this->movilizacion_km_salida = $old_value_movilizacion_km_salida;
   $this->movilizacion_cant_km_adicional = $old_value_movilizacion_cant_km_adicional;
   $this->movilizacion_km_llegada = $old_value_movilizacion_km_llegada;
   $this->movilizacion_excedente = $old_value_movilizacion_excedente;
   $this->movilizacion_recorrido_vehiculo = $old_value_movilizacion_recorrido_vehiculo;
   $this->movilizacion_total_km_recorrido = $old_value_movilizacion_total_km_recorrido;
   $this->movilizacion_costo_galon = $old_value_movilizacion_costo_galon;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_movilizacion_impresion_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_movilizacion_impresion_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"idusuario\"";
          if (isset($this->NM_ajax_info['select_html']['idusuario']) && !empty($this->NM_ajax_info['select_html']['idusuario']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['idusuario'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->idusuario == $sValue)
                  {
                      $this->_tmp_lookup_idusuario = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("idusuario", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['idusuario'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['idusuario']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['idusuario']['valList'][$i] = form_movilizacion_impresion_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['idusuario']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['idusuario']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['idusuario']['labList'] = $aLabel;
          }
   }

          //----- idvehiculo
   function ajax_return_values_idvehiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idvehiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idvehiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idvehiculo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
              $orig_idvehiculo = $this->idvehiculo;
              $idvehiculo      = $this->idvehiculo;
              nm_limpa_numero($idvehiculo, $this->field_config['idvehiculo']['symbol_grp']); 
              $this->idvehiculo = $idvehiculo;
              $this->lookup_idvehiculo($conteudo);
              $this->idvehiculo = $orig_idvehiculo;
              $this->NM_ajax_info['fldList']['idvehiculo']['lookupCons'] = form_movilizacion_impresion_mob_pack_protect_string(NM_charset_to_utf8($conteudo));
          }
   }

          //----- movilizacion_funcionario
   function ajax_return_values_movilizacion_funcionario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_funcionario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_funcionario);
              $aLookup = array();
              $this->_tmp_lookup_movilizacion_funcionario = $this->movilizacion_funcionario;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'] = array(); 
}
$aLookup[] = array(form_movilizacion_impresion_mob_pack_protect_string('') => form_movilizacion_impresion_mob_pack_protect_string('Seleccione'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_movilizacion = $this->id_movilizacion;
   $old_value_movilizacion_fecha = $this->movilizacion_fecha;
   $old_value_idvehiculo = $this->idvehiculo;
   $old_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $old_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $old_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $old_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $old_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $old_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $old_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $old_value_movilizacion_excedente = $this->movilizacion_excedente;
   $old_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $old_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $old_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_movilizacion = $this->id_movilizacion;
   $unformatted_value_movilizacion_fecha = $this->movilizacion_fecha;
   $unformatted_value_idvehiculo = $this->idvehiculo;
   $unformatted_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $unformatted_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $unformatted_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $unformatted_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $unformatted_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $unformatted_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $unformatted_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $unformatted_value_movilizacion_excedente = $this->movilizacion_excedente;
   $unformatted_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $unformatted_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $unformatted_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;

   $nm_comando = "SELECT idusuario, concat(usuario_apellidos,' ',usuario_nombres)  FROM usuario  WHERE usuario_cargo <> 1 ORDER BY usuario_apellidos, usuario_nombres";

   $this->id_movilizacion = $old_value_id_movilizacion;
   $this->movilizacion_fecha = $old_value_movilizacion_fecha;
   $this->idvehiculo = $old_value_idvehiculo;
   $this->movilizacion_hora_salida = $old_value_movilizacion_hora_salida;
   $this->movilizacion_total_combustible = $old_value_movilizacion_total_combustible;
   $this->movilizacion_hora_llegada = $old_value_movilizacion_hora_llegada;
   $this->movilizacion_total_galones = $old_value_movilizacion_total_galones;
   $this->movilizacion_km_salida = $old_value_movilizacion_km_salida;
   $this->movilizacion_cant_km_adicional = $old_value_movilizacion_cant_km_adicional;
   $this->movilizacion_km_llegada = $old_value_movilizacion_km_llegada;
   $this->movilizacion_excedente = $old_value_movilizacion_excedente;
   $this->movilizacion_recorrido_vehiculo = $old_value_movilizacion_recorrido_vehiculo;
   $this->movilizacion_total_km_recorrido = $old_value_movilizacion_total_km_recorrido;
   $this->movilizacion_costo_galon = $old_value_movilizacion_costo_galon;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_movilizacion_impresion_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_movilizacion_impresion_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"movilizacion_funcionario\"";
          if (isset($this->NM_ajax_info['select_html']['movilizacion_funcionario']) && !empty($this->NM_ajax_info['select_html']['movilizacion_funcionario']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['movilizacion_funcionario'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->movilizacion_funcionario == $sValue)
                  {
                      $this->_tmp_lookup_movilizacion_funcionario = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $Nm_tp_obj = (isset($this->nmgp_refresh_fields) && in_array("movilizacion_funcionario", $this->nmgp_refresh_fields)) ? 'select' : 'text';
          $this->NM_ajax_info['fldList']['movilizacion_funcionario'] = array(
                       'row'    => '',
               'type'    => $Nm_tp_obj,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['movilizacion_funcionario']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['movilizacion_funcionario']['valList'][$i] = form_movilizacion_impresion_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['movilizacion_funcionario']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['movilizacion_funcionario']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['movilizacion_funcionario']['labList'] = $aLabel;
          }
   }

          //----- movilizacion_hora_salida
   function ajax_return_values_movilizacion_hora_salida($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_hora_salida", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_hora_salida);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_hora_salida'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_total_combustible
   function ajax_return_values_movilizacion_total_combustible($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_total_combustible", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_total_combustible);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_total_combustible'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_hora_llegada
   function ajax_return_values_movilizacion_hora_llegada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_hora_llegada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_hora_llegada);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_hora_llegada'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_total_galones
   function ajax_return_values_movilizacion_total_galones($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_total_galones", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_total_galones);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_total_galones'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_km_salida
   function ajax_return_values_movilizacion_km_salida($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_km_salida", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_km_salida);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_km_salida'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_cant_km_adicional
   function ajax_return_values_movilizacion_cant_km_adicional($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_cant_km_adicional", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_cant_km_adicional);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_cant_km_adicional'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_km_llegada
   function ajax_return_values_movilizacion_km_llegada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_km_llegada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_km_llegada);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_km_llegada'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_excedente
   function ajax_return_values_movilizacion_excedente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_excedente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_excedente);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_excedente'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_recorrido_vehiculo
   function ajax_return_values_movilizacion_recorrido_vehiculo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_recorrido_vehiculo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_recorrido_vehiculo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_recorrido_vehiculo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_total_km_recorrido
   function ajax_return_values_movilizacion_total_km_recorrido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_total_km_recorrido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_total_km_recorrido);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_total_km_recorrido'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- movilizacion_costo_galon
   function ajax_return_values_movilizacion_costo_galon($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("movilizacion_costo_galon", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->movilizacion_costo_galon);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['movilizacion_costo_galon'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- detalle_movilizacion
   function ajax_return_values_detalle_movilizacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("detalle_movilizacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->detalle_movilizacion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['detalle_movilizacion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'on';
  if($this->id_movilizacion  <> 0)
	{
		$check_sql = " SELECT IdVehiculo, Concat('Modelo: ',vehiculos.Vehiculo_Modelo,'---Placa: ',vehiculos.Vehiculo_Placa)  
FROM vehiculos
WHERE IdVehiculo ='" . $this->idvehiculo  . "'";
		 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

		if (isset($this->rs[0][0]))     
			{
				$this->idvehiculo  = $this->rs[0][0];
			}
			else{
					$this->idvehiculo  = '';
				}
	}
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'off'; 
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->movilizacion_total_combustible = str_replace($sc_parm1, $sc_parm2, $this->movilizacion_total_combustible); 
      $this->movilizacion_total_galones = str_replace($sc_parm1, $sc_parm2, $this->movilizacion_total_galones); 
      $this->movilizacion_costo_galon = str_replace($sc_parm1, $sc_parm2, $this->movilizacion_costo_galon); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->movilizacion_total_combustible = "'" . $this->movilizacion_total_combustible . "'";
      $this->movilizacion_total_galones = "'" . $this->movilizacion_total_galones . "'";
      $this->movilizacion_costo_galon = "'" . $this->movilizacion_costo_galon . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->movilizacion_total_combustible = str_replace("'", "", $this->movilizacion_total_combustible); 
      $this->movilizacion_total_galones = str_replace("'", "", $this->movilizacion_total_galones); 
      $this->movilizacion_costo_galon = str_replace("'", "", $this->movilizacion_costo_galon); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'on';
              /* historial_movilizacion */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM historial_movilizacion WHERE movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM historial_movilizacion WHERE movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM historial_movilizacion WHERE movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM historial_movilizacion WHERE movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM historial_movilizacion WHERE movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_historial_movilizacion = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_historial_movilizacion[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_historial_movilizacion = false;
          $this->dataset_historial_movilizacion_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_historial_movilizacion[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_movilizacion_impresion_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* rutas */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM rutas WHERE Movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM rutas WHERE Movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM rutas WHERE Movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM rutas WHERE Movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM rutas WHERE Movilizacion_Id_Movilizacion = " . $this->id_movilizacion ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_rutas = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_rutas[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_rutas = false;
          $this->dataset_rutas_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_rutas[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_movilizacion_impresion_mob' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $SC_tem_cmp_update = false; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['id_movilizacion'] = $this->id_movilizacion;
      $NM_val_form['movilizacion_fecha'] = $this->movilizacion_fecha;
      $NM_val_form['idusuario'] = $this->idusuario;
      $NM_val_form['idvehiculo'] = $this->idvehiculo;
      $NM_val_form['movilizacion_funcionario'] = $this->movilizacion_funcionario;
      $NM_val_form['movilizacion_hora_salida'] = $this->movilizacion_hora_salida;
      $NM_val_form['movilizacion_total_combustible'] = $this->movilizacion_total_combustible;
      $NM_val_form['movilizacion_hora_llegada'] = $this->movilizacion_hora_llegada;
      $NM_val_form['movilizacion_total_galones'] = $this->movilizacion_total_galones;
      $NM_val_form['movilizacion_km_salida'] = $this->movilizacion_km_salida;
      $NM_val_form['movilizacion_cant_km_adicional'] = $this->movilizacion_cant_km_adicional;
      $NM_val_form['movilizacion_km_llegada'] = $this->movilizacion_km_llegada;
      $NM_val_form['movilizacion_excedente'] = $this->movilizacion_excedente;
      $NM_val_form['movilizacion_recorrido_vehiculo'] = $this->movilizacion_recorrido_vehiculo;
      $NM_val_form['movilizacion_total_km_recorrido'] = $this->movilizacion_total_km_recorrido;
      $NM_val_form['movilizacion_costo_galon'] = $this->movilizacion_costo_galon;
      $NM_val_form['detalle_movilizacion'] = $this->detalle_movilizacion;
      $NM_val_form['movilizacion_ruta'] = $this->movilizacion_ruta;
      $NM_val_form['km_galon'] = $this->km_galon;
      $NM_val_form['libre'] = $this->libre;
      $NM_val_form['libre2'] = $this->libre2;
      if ($this->id_movilizacion == "")  
      { 
          $this->id_movilizacion = 0;
      } 
      if ($this->idvehiculo == "")  
      { 
          $this->idvehiculo = 0;
          $this->sc_force_zero[] = 'idvehiculo';
      } 
      if ($this->idusuario == "")  
      { 
          $this->idusuario = 0;
          $this->sc_force_zero[] = 'idusuario';
      } 
      if ($this->movilizacion_km_salida == "")  
      { 
          $this->movilizacion_km_salida = 0;
          $this->sc_force_zero[] = 'movilizacion_km_salida';
      } 
      if ($this->movilizacion_km_llegada == "")  
      { 
          $this->movilizacion_km_llegada = 0;
          $this->sc_force_zero[] = 'movilizacion_km_llegada';
      } 
      if ($this->movilizacion_costo_galon == "")  
      { 
          $this->movilizacion_costo_galon = 0;
          $this->sc_force_zero[] = 'movilizacion_costo_galon';
      } 
      if ($this->movilizacion_cant_km_adicional == "")  
      { 
          $this->movilizacion_cant_km_adicional = 0;
          $this->sc_force_zero[] = 'movilizacion_cant_km_adicional';
      } 
      if ($this->movilizacion_total_km_recorrido == "")  
      { 
          $this->movilizacion_total_km_recorrido = 0;
          $this->sc_force_zero[] = 'movilizacion_total_km_recorrido';
      } 
      if ($this->movilizacion_recorrido_vehiculo == "")  
      { 
          $this->movilizacion_recorrido_vehiculo = 0;
          $this->sc_force_zero[] = 'movilizacion_recorrido_vehiculo';
      } 
      if ($this->movilizacion_excedente == "")  
      { 
          $this->movilizacion_excedente = 0;
          $this->sc_force_zero[] = 'movilizacion_excedente';
      } 
      if ($this->movilizacion_total_galones == "")  
      { 
          $this->movilizacion_total_galones = 0;
          $this->sc_force_zero[] = 'movilizacion_total_galones';
      } 
      if ($this->movilizacion_total_combustible == "")  
      { 
          $this->movilizacion_total_combustible = 0;
          $this->sc_force_zero[] = 'movilizacion_total_combustible';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->movilizacion_funcionario_before_qstr = $this->movilizacion_funcionario;
          $this->movilizacion_funcionario = substr($this->Db->qstr($this->movilizacion_funcionario), 1, -1); 
          if ($this->movilizacion_funcionario == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->movilizacion_funcionario = "null"; 
              $NM_val_null[] = "movilizacion_funcionario";
          } 
          if ($this->movilizacion_fecha == "")  
          { 
              $this->movilizacion_fecha = "null"; 
              $NM_val_null[] = "movilizacion_fecha";
          } 
          $this->movilizacion_ruta_before_qstr = $this->movilizacion_ruta;
          $this->movilizacion_ruta = substr($this->Db->qstr($this->movilizacion_ruta), 1, -1); 
          if ($this->movilizacion_ruta == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->movilizacion_ruta = "null"; 
              $NM_val_null[] = "movilizacion_ruta";
          } 
          if ($this->movilizacion_hora_salida == "")  
          { 
              $this->movilizacion_hora_salida = "null"; 
              $NM_val_null[] = "movilizacion_hora_salida";
          } 
          if ($this->movilizacion_hora_llegada == "")  
          { 
              $this->movilizacion_hora_llegada = "null"; 
              $NM_val_null[] = "movilizacion_hora_llegada";
          } 
          $this->detalle_movilizacion_before_qstr = $this->detalle_movilizacion;
          $this->detalle_movilizacion = substr($this->Db->qstr($this->detalle_movilizacion), 1, -1); 
          if ($this->detalle_movilizacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->detalle_movilizacion = "null"; 
              $NM_val_null[] = "detalle_movilizacion";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = false; 
          $SC_ex_upd_or = false; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_movilizacion_impresion_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_ex_update      = false; 
                  $SC_ex_upd_or      = false; 
                  $SC_tem_cmp_update = false; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_ex_update      = false; 
                  $SC_ex_upd_or      = false; 
                  $SC_tem_cmp_update = false; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_ex_update      = false; 
                  $SC_ex_upd_or      = false; 
                  $SC_tem_cmp_update = false; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_ex_update      = false; 
                  $SC_ex_upd_or      = false; 
                  $SC_tem_cmp_update = false; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_ex_update      = false; 
                  $SC_ex_upd_or      = false; 
                  $SC_tem_cmp_update = false; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_ex_update      = false; 
                  $SC_ex_upd_or      = false; 
                  $SC_tem_cmp_update = false; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_ex_update      = false; 
                  $SC_ex_upd_or      = false; 
              } 
              if (isset($NM_val_form['idvehiculo']) && $NM_val_form['idvehiculo'] != $this->nmgp_dados_select['idvehiculo']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " IdVehiculo = $this->idvehiculo"; 
                  $comando_oracle        .= " IdVehiculo = $this->idvehiculo"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['idusuario']) && $NM_val_form['idusuario'] != $this->nmgp_dados_select['idusuario']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " idusuario = $this->idusuario"; 
                  $comando_oracle        .= " idusuario = $this->idusuario"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_funcionario']) && $NM_val_form['movilizacion_funcionario'] != $this->nmgp_dados_select['movilizacion_funcionario']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " movilizacion_funcionario = '$this->movilizacion_funcionario'"; 
                  $comando_oracle        .= " movilizacion_funcionario = '$this->movilizacion_funcionario'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_fecha']) && $NM_val_form['movilizacion_fecha'] != $this->nmgp_dados_select['movilizacion_fecha']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $comando        .= " Movilizacion_Fecha = #$this->movilizacion_fecha#"; 
                  } 
                  else 
                  { 
                      $comando        .= " Movilizacion_Fecha = " . $this->Ini->date_delim . $this->movilizacion_fecha . $this->Ini->date_delim1 . ""; 
                  } 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $comando_oracle        .= " Movilizacion_Fecha = EXTEND('" . $this->movilizacion_fecha . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $comando_oracle        .= " Movilizacion_Fecha = " . $this->Ini->date_delim . $this->movilizacion_fecha . $this->Ini->date_delim1 . ""; 
                  } 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_ruta']) && $NM_val_form['movilizacion_ruta'] != $this->nmgp_dados_select['movilizacion_ruta']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " Movilizacion_Ruta = '$this->movilizacion_ruta'"; 
                  $comando_oracle        .= " Movilizacion_Ruta = '$this->movilizacion_ruta'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_hora_salida']) && $NM_val_form['movilizacion_hora_salida'] != $this->nmgp_dados_select['movilizacion_hora_salida']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $comando        .= " Movilizacion_Hora_Salida = #$this->movilizacion_hora_salida#"; 
                  } 
                  else 
                  { 
                      $comando        .= " Movilizacion_Hora_Salida = " . $this->Ini->date_delim . $this->movilizacion_hora_salida . $this->Ini->date_delim1 . ""; 
                  } 
                  $comando_oracle        .= " Movilizacion_Hora_Salida = " . $this->Ini->date_delim . $this->movilizacion_hora_salida . $this->Ini->date_delim1 . ""; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_hora_llegada']) && $NM_val_form['movilizacion_hora_llegada'] != $this->nmgp_dados_select['movilizacion_hora_llegada']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $comando        .= " Movilizacion_Hora_Llegada = #$this->movilizacion_hora_llegada#"; 
                  } 
                  else 
                  { 
                      $comando        .= " Movilizacion_Hora_Llegada = " . $this->Ini->date_delim . $this->movilizacion_hora_llegada . $this->Ini->date_delim1 . ""; 
                  } 
                  $comando_oracle        .= " Movilizacion_Hora_Llegada = " . $this->Ini->date_delim . $this->movilizacion_hora_llegada . $this->Ini->date_delim1 . ""; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_km_salida']) && $NM_val_form['movilizacion_km_salida'] != $this->nmgp_dados_select['movilizacion_km_salida']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " Movilizacion_Km_Salida = $this->movilizacion_km_salida"; 
                  $comando_oracle        .= " Movilizacion_Km_Salida = $this->movilizacion_km_salida"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_km_llegada']) && $NM_val_form['movilizacion_km_llegada'] != $this->nmgp_dados_select['movilizacion_km_llegada']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " Movilizacion_Km_Llegada = $this->movilizacion_km_llegada"; 
                  $comando_oracle        .= " Movilizacion_Km_Llegada = $this->movilizacion_km_llegada"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_costo_galon']) && $NM_val_form['movilizacion_costo_galon'] != $this->nmgp_dados_select['movilizacion_costo_galon']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " Movilizacion_Costo_Galon = $this->movilizacion_costo_galon"; 
                  $comando_oracle        .= " Movilizacion_Costo_Galon = $this->movilizacion_costo_galon"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_cant_km_adicional']) && $NM_val_form['movilizacion_cant_km_adicional'] != $this->nmgp_dados_select['movilizacion_cant_km_adicional']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional"; 
                  $comando_oracle        .= " movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_total_km_recorrido']) && $NM_val_form['movilizacion_total_km_recorrido'] != $this->nmgp_dados_select['movilizacion_total_km_recorrido']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " Movilizacion_Total_Km_Recorrido = $this->movilizacion_total_km_recorrido"; 
                  $comando_oracle        .= " Movilizacion_Total_Km_Recorrido = $this->movilizacion_total_km_recorrido"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_recorrido_vehiculo']) && $NM_val_form['movilizacion_recorrido_vehiculo'] != $this->nmgp_dados_select['movilizacion_recorrido_vehiculo']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " movilizacion_Recorrido_Vehiculo = $this->movilizacion_recorrido_vehiculo"; 
                  $comando_oracle        .= " movilizacion_Recorrido_Vehiculo = $this->movilizacion_recorrido_vehiculo"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_excedente']) && $NM_val_form['movilizacion_excedente'] != $this->nmgp_dados_select['movilizacion_excedente']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " movilizacion_Excedente = $this->movilizacion_excedente"; 
                  $comando_oracle        .= " movilizacion_Excedente = $this->movilizacion_excedente"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_total_galones']) && $NM_val_form['movilizacion_total_galones'] != $this->nmgp_dados_select['movilizacion_total_galones']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " Movilizacion_Total_Galones = $this->movilizacion_total_galones"; 
                  $comando_oracle        .= " Movilizacion_Total_Galones = $this->movilizacion_total_galones"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['movilizacion_total_combustible']) && $NM_val_form['movilizacion_total_combustible'] != $this->nmgp_dados_select['movilizacion_total_combustible']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " movilizacion_total_combustible = $this->movilizacion_total_combustible"; 
                  $comando_oracle        .= " movilizacion_total_combustible = $this->movilizacion_total_combustible"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE Id_Movilizacion = $this->id_movilizacion ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE Id_Movilizacion = $this->id_movilizacion ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE Id_Movilizacion = $this->id_movilizacion ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE Id_Movilizacion = $this->id_movilizacion ";  
              }  
              else  
              {
                  $comando .= " WHERE Id_Movilizacion = $this->id_movilizacion ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_movilizacion_impresion_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->movilizacion_funcionario = $this->movilizacion_funcionario_before_qstr;
          $this->movilizacion_ruta = $this->movilizacion_ruta_before_qstr;
          $this->detalle_movilizacion = $this->detalle_movilizacion_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id_movilizacion'])) { $this->id_movilizacion = $NM_val_form['id_movilizacion']; }
              elseif (isset($this->id_movilizacion)) { $this->nm_limpa_alfa($this->id_movilizacion); }
              if     (isset($NM_val_form) && isset($NM_val_form['idvehiculo'])) { $this->idvehiculo = $NM_val_form['idvehiculo']; }
              elseif (isset($this->idvehiculo)) { $this->nm_limpa_alfa($this->idvehiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['idusuario'])) { $this->idusuario = $NM_val_form['idusuario']; }
              elseif (isset($this->idusuario)) { $this->nm_limpa_alfa($this->idusuario); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_funcionario'])) { $this->movilizacion_funcionario = $NM_val_form['movilizacion_funcionario']; }
              elseif (isset($this->movilizacion_funcionario)) { $this->nm_limpa_alfa($this->movilizacion_funcionario); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_km_salida'])) { $this->movilizacion_km_salida = $NM_val_form['movilizacion_km_salida']; }
              elseif (isset($this->movilizacion_km_salida)) { $this->nm_limpa_alfa($this->movilizacion_km_salida); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_km_llegada'])) { $this->movilizacion_km_llegada = $NM_val_form['movilizacion_km_llegada']; }
              elseif (isset($this->movilizacion_km_llegada)) { $this->nm_limpa_alfa($this->movilizacion_km_llegada); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_costo_galon'])) { $this->movilizacion_costo_galon = $NM_val_form['movilizacion_costo_galon']; }
              elseif (isset($this->movilizacion_costo_galon)) { $this->nm_limpa_alfa($this->movilizacion_costo_galon); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_cant_km_adicional'])) { $this->movilizacion_cant_km_adicional = $NM_val_form['movilizacion_cant_km_adicional']; }
              elseif (isset($this->movilizacion_cant_km_adicional)) { $this->nm_limpa_alfa($this->movilizacion_cant_km_adicional); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_total_km_recorrido'])) { $this->movilizacion_total_km_recorrido = $NM_val_form['movilizacion_total_km_recorrido']; }
              elseif (isset($this->movilizacion_total_km_recorrido)) { $this->nm_limpa_alfa($this->movilizacion_total_km_recorrido); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_recorrido_vehiculo'])) { $this->movilizacion_recorrido_vehiculo = $NM_val_form['movilizacion_recorrido_vehiculo']; }
              elseif (isset($this->movilizacion_recorrido_vehiculo)) { $this->nm_limpa_alfa($this->movilizacion_recorrido_vehiculo); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_excedente'])) { $this->movilizacion_excedente = $NM_val_form['movilizacion_excedente']; }
              elseif (isset($this->movilizacion_excedente)) { $this->nm_limpa_alfa($this->movilizacion_excedente); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_total_galones'])) { $this->movilizacion_total_galones = $NM_val_form['movilizacion_total_galones']; }
              elseif (isset($this->movilizacion_total_galones)) { $this->nm_limpa_alfa($this->movilizacion_total_galones); }
              if     (isset($NM_val_form) && isset($NM_val_form['movilizacion_total_combustible'])) { $this->movilizacion_total_combustible = $NM_val_form['movilizacion_total_combustible']; }
              elseif (isset($this->movilizacion_total_combustible)) { $this->nm_limpa_alfa($this->movilizacion_total_combustible); }
              if     (isset($NM_val_form) && isset($NM_val_form['detalle_movilizacion'])) { $this->detalle_movilizacion = $NM_val_form['detalle_movilizacion']; }
              elseif (isset($this->detalle_movilizacion)) { $this->nm_limpa_alfa($this->detalle_movilizacion); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id_movilizacion', 'movilizacion_fecha', 'idusuario', 'idvehiculo', 'movilizacion_funcionario', 'movilizacion_hora_salida', 'movilizacion_total_combustible', 'movilizacion_hora_llegada', 'movilizacion_total_galones', 'movilizacion_km_salida', 'movilizacion_cant_km_adicional', 'movilizacion_km_llegada', 'movilizacion_excedente', 'movilizacion_recorrido_vehiculo', 'movilizacion_total_km_recorrido', 'movilizacion_costo_galon', 'detalle_movilizacion'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "Id_Movilizacion, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_movilizacion_impresion_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (IdVehiculo, idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible) VALUES ($this->idvehiculo, $this->idusuario, '$this->movilizacion_funcionario', #$this->movilizacion_fecha#, '$this->movilizacion_ruta', #$this->movilizacion_hora_salida#, #$this->movilizacion_hora_llegada#, $this->movilizacion_km_salida, $this->movilizacion_km_llegada, $this->movilizacion_costo_galon, $this->movilizacion_cant_km_adicional, $this->movilizacion_total_km_recorrido, $this->movilizacion_recorrido_vehiculo, $this->movilizacion_excedente, $this->movilizacion_total_galones, $this->movilizacion_total_combustible)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "IdVehiculo, idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible) VALUES (" . $NM_seq_auto . "$this->idvehiculo, $this->idusuario, '$this->movilizacion_funcionario', " . $this->Ini->date_delim . $this->movilizacion_fecha . $this->Ini->date_delim1 . ", '$this->movilizacion_ruta', " . $this->Ini->date_delim . $this->movilizacion_hora_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->movilizacion_hora_llegada . $this->Ini->date_delim1 . ", $this->movilizacion_km_salida, $this->movilizacion_km_llegada, $this->movilizacion_costo_galon, $this->movilizacion_cant_km_adicional, $this->movilizacion_total_km_recorrido, $this->movilizacion_recorrido_vehiculo, $this->movilizacion_excedente, $this->movilizacion_total_galones, $this->movilizacion_total_combustible)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "IdVehiculo, idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible) VALUES (" . $NM_seq_auto . "$this->idvehiculo, $this->idusuario, '$this->movilizacion_funcionario', " . $this->Ini->date_delim . $this->movilizacion_fecha . $this->Ini->date_delim1 . ", '$this->movilizacion_ruta', " . $this->Ini->date_delim . $this->movilizacion_hora_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->movilizacion_hora_llegada . $this->Ini->date_delim1 . ", $this->movilizacion_km_salida, $this->movilizacion_km_llegada, $this->movilizacion_costo_galon, $this->movilizacion_cant_km_adicional, $this->movilizacion_total_km_recorrido, $this->movilizacion_recorrido_vehiculo, $this->movilizacion_excedente, $this->movilizacion_total_galones, $this->movilizacion_total_combustible)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "IdVehiculo, idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible) VALUES (" . $NM_seq_auto . "$this->idvehiculo, $this->idusuario, '$this->movilizacion_funcionario', " . $this->Ini->date_delim . $this->movilizacion_fecha . $this->Ini->date_delim1 . ", '$this->movilizacion_ruta', " . $this->Ini->date_delim . $this->movilizacion_hora_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->movilizacion_hora_llegada . $this->Ini->date_delim1 . ", $this->movilizacion_km_salida, $this->movilizacion_km_llegada, $this->movilizacion_costo_galon, $this->movilizacion_cant_km_adicional, $this->movilizacion_total_km_recorrido, $this->movilizacion_recorrido_vehiculo, $this->movilizacion_excedente, $this->movilizacion_total_galones, $this->movilizacion_total_combustible)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "IdVehiculo, idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible) VALUES (" . $NM_seq_auto . "$this->idvehiculo, $this->idusuario, '$this->movilizacion_funcionario', EXTEND('$this->movilizacion_fecha', YEAR TO DAY), '$this->movilizacion_ruta', " . $this->Ini->date_delim . $this->movilizacion_hora_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->movilizacion_hora_llegada . $this->Ini->date_delim1 . ", $this->movilizacion_km_salida, $this->movilizacion_km_llegada, $this->movilizacion_costo_galon, $this->movilizacion_cant_km_adicional, $this->movilizacion_total_km_recorrido, $this->movilizacion_recorrido_vehiculo, $this->movilizacion_excedente, $this->movilizacion_total_galones, $this->movilizacion_total_combustible)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "IdVehiculo, idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible) VALUES (" . $NM_seq_auto . "$this->idvehiculo, $this->idusuario, '$this->movilizacion_funcionario', " . $this->Ini->date_delim . $this->movilizacion_fecha . $this->Ini->date_delim1 . ", '$this->movilizacion_ruta', " . $this->Ini->date_delim . $this->movilizacion_hora_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->movilizacion_hora_llegada . $this->Ini->date_delim1 . ", $this->movilizacion_km_salida, $this->movilizacion_km_llegada, $this->movilizacion_costo_galon, $this->movilizacion_cant_km_adicional, $this->movilizacion_total_km_recorrido, $this->movilizacion_recorrido_vehiculo, $this->movilizacion_excedente, $this->movilizacion_total_galones, $this->movilizacion_total_combustible)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "IdVehiculo, idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible) VALUES (" . $NM_seq_auto . "$this->idvehiculo, $this->idusuario, '$this->movilizacion_funcionario', " . $this->Ini->date_delim . $this->movilizacion_fecha . $this->Ini->date_delim1 . ", '$this->movilizacion_ruta', " . $this->Ini->date_delim . $this->movilizacion_hora_salida . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->movilizacion_hora_llegada . $this->Ini->date_delim1 . ", $this->movilizacion_km_salida, $this->movilizacion_km_llegada, $this->movilizacion_costo_galon, $this->movilizacion_cant_km_adicional, $this->movilizacion_total_km_recorrido, $this->movilizacion_recorrido_vehiculo, $this->movilizacion_excedente, $this->movilizacion_total_galones, $this->movilizacion_total_combustible)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_movilizacion_impresion_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_movilizacion_impresion_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_movilizacion =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_movilizacion = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_movilizacion = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_movilizacion = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_movilizacion = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_movilizacion = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_movilizacion = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id_movilizacion = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->sc_insert_on = true; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['imprimir'] = "on";
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_movilizacion = substr($this->Db->qstr($this->id_movilizacion), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "Id_Movilizacion = " . $this->id_movilizacion . "";
              $this->form_detalle_movilizacion_impresion_mob->ini_controle();
              if ($this->form_detalle_movilizacion_impresion_mob->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Id_Movilizacion = $this->id_movilizacion "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_movilizacion_impresion_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'on';
  $this->kilometraje();
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'on';
  $this->kilometraje();
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'on';
  $this->kilometraje();
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['parms'] = "id_movilizacion?#?$this->id_movilizacion?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_movilizacion = substr($this->Db->qstr($this->id_movilizacion), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id_movilizacion)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->id_movilizacion) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("Id_Movilizacion = " . $_SESSION['Movilizacion_id'] . "");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_movilizacion_impresion_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total'] = $qt_geral_reg_form_movilizacion_impresion_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_movilizacion))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "Id_Movilizacion < $this->id_movilizacion "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "Id_Movilizacion < $this->id_movilizacion "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "Id_Movilizacion < $this->id_movilizacion "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "Id_Movilizacion < $this->id_movilizacion "; 
              }
              else  
              {
                  $Key_Where = "Id_Movilizacion < $this->id_movilizacion "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_movilizacion_impresion_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] > $qt_geral_reg_form_movilizacion_impresion_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] = $qt_geral_reg_form_movilizacion_impresion_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] = $qt_geral_reg_form_movilizacion_impresion_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT Id_Movilizacion, IdVehiculo, idusuario, movilizacion_funcionario, str_replace (convert(char(10),Movilizacion_Fecha,102), '.', '-') + ' ' + convert(char(8),Movilizacion_Fecha,20), Movilizacion_Ruta, str_replace (convert(char(10),Movilizacion_Hora_Salida,102), '.', '-') + ' ' + convert(char(8),Movilizacion_Hora_Salida,20), str_replace (convert(char(10),Movilizacion_Hora_Llegada,102), '.', '-') + ' ' + convert(char(8),Movilizacion_Hora_Llegada,20), Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT Id_Movilizacion, IdVehiculo, idusuario, movilizacion_funcionario, convert(char(23),Movilizacion_Fecha,121), Movilizacion_Ruta, convert(char(23),Movilizacion_Hora_Salida,121), convert(char(23),Movilizacion_Hora_Llegada,121), Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT Id_Movilizacion, IdVehiculo, idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT Id_Movilizacion, IdVehiculo, idusuario, movilizacion_funcionario, EXTEND(Movilizacion_Fecha, YEAR TO DAY), Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT Id_Movilizacion, IdVehiculo, idusuario, movilizacion_funcionario, Movilizacion_Fecha, Movilizacion_Ruta, Movilizacion_Hora_Salida, Movilizacion_Hora_Llegada, Movilizacion_Km_Salida, Movilizacion_Km_Llegada, Movilizacion_Costo_Galon, movilizacion_cant_km_adicional, Movilizacion_Total_Km_Recorrido, movilizacion_Recorrido_Vehiculo, movilizacion_Excedente, Movilizacion_Total_Galones, movilizacion_total_combustible from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "Id_Movilizacion = " . $_SESSION['Movilizacion_id'] . "";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "Id_Movilizacion = $this->id_movilizacion"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "Id_Movilizacion = $this->id_movilizacion"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "Id_Movilizacion = $this->id_movilizacion"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "Id_Movilizacion = $this->id_movilizacion"; 
                  }  
                  else  
                  {
                     $aWhere[] = "Id_Movilizacion = $this->id_movilizacion"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "Id_Movilizacion";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes['imprimir'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              $this->NM_ajax_info['buttonDisplay']['imprimir'] = $this->nmgp_botoes['imprimir'] = "off";
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id_movilizacion = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_movilizacion'] = $this->id_movilizacion;
              $this->idvehiculo = $rs->fields[1] ; 
              $this->nmgp_dados_select['idvehiculo'] = $this->idvehiculo;
              $this->idusuario = $rs->fields[2] ; 
              $this->nmgp_dados_select['idusuario'] = $this->idusuario;
              $this->movilizacion_funcionario = $rs->fields[3] ; 
              $this->nmgp_dados_select['movilizacion_funcionario'] = $this->movilizacion_funcionario;
              $this->movilizacion_fecha = $rs->fields[4] ; 
              $this->nmgp_dados_select['movilizacion_fecha'] = $this->movilizacion_fecha;
              $this->movilizacion_ruta = $rs->fields[5] ; 
              $this->nmgp_dados_select['movilizacion_ruta'] = $this->movilizacion_ruta;
              $this->movilizacion_hora_salida = $rs->fields[6] ; 
              $this->nmgp_dados_select['movilizacion_hora_salida'] = $this->movilizacion_hora_salida;
              $this->movilizacion_hora_llegada = $rs->fields[7] ; 
              $this->nmgp_dados_select['movilizacion_hora_llegada'] = $this->movilizacion_hora_llegada;
              $this->movilizacion_km_salida = trim($rs->fields[8]) ; 
              $this->nmgp_dados_select['movilizacion_km_salida'] = $this->movilizacion_km_salida;
              $this->movilizacion_km_llegada = trim($rs->fields[9]) ; 
              $this->nmgp_dados_select['movilizacion_km_llegada'] = $this->movilizacion_km_llegada;
              $this->movilizacion_costo_galon = trim($rs->fields[10]) ; 
              $this->nmgp_dados_select['movilizacion_costo_galon'] = $this->movilizacion_costo_galon;
              $this->movilizacion_cant_km_adicional = $rs->fields[11] ; 
              $this->nmgp_dados_select['movilizacion_cant_km_adicional'] = $this->movilizacion_cant_km_adicional;
              $this->movilizacion_total_km_recorrido = trim($rs->fields[12]) ; 
              $this->nmgp_dados_select['movilizacion_total_km_recorrido'] = $this->movilizacion_total_km_recorrido;
              $this->movilizacion_recorrido_vehiculo = trim($rs->fields[13]) ; 
              $this->nmgp_dados_select['movilizacion_recorrido_vehiculo'] = $this->movilizacion_recorrido_vehiculo;
              $this->movilizacion_excedente = trim($rs->fields[14]) ; 
              $this->nmgp_dados_select['movilizacion_excedente'] = $this->movilizacion_excedente;
              $this->movilizacion_total_galones = trim($rs->fields[15]) ; 
              $this->nmgp_dados_select['movilizacion_total_galones'] = $this->movilizacion_total_galones;
              $this->movilizacion_total_combustible = trim($rs->fields[16]) ; 
              $this->nmgp_dados_select['movilizacion_total_combustible'] = $this->movilizacion_total_combustible;
              $this->detalle_movilizacion = $rs->fields[17] ; 
              $this->nmgp_dados_select['detalle_movilizacion'] = $this->detalle_movilizacion;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id_movilizacion = (string)$this->id_movilizacion; 
              $this->idvehiculo = (string)$this->idvehiculo; 
              $this->idusuario = (string)$this->idusuario; 
              $this->movilizacion_km_salida = (strpos(strtolower($this->movilizacion_km_salida), "e")) ? (float)$this->movilizacion_km_salida : $this->movilizacion_km_salida; 
              $this->movilizacion_km_salida = (string)$this->movilizacion_km_salida; 
              $this->movilizacion_km_llegada = (strpos(strtolower($this->movilizacion_km_llegada), "e")) ? (float)$this->movilizacion_km_llegada : $this->movilizacion_km_llegada; 
              $this->movilizacion_km_llegada = (string)$this->movilizacion_km_llegada; 
              $this->movilizacion_costo_galon = (strpos(strtolower($this->movilizacion_costo_galon), "e")) ? (float)$this->movilizacion_costo_galon : $this->movilizacion_costo_galon; 
              $this->movilizacion_costo_galon = (string)$this->movilizacion_costo_galon; 
              $this->movilizacion_cant_km_adicional = (string)$this->movilizacion_cant_km_adicional; 
              $this->movilizacion_total_km_recorrido = (strpos(strtolower($this->movilizacion_total_km_recorrido), "e")) ? (float)$this->movilizacion_total_km_recorrido : $this->movilizacion_total_km_recorrido; 
              $this->movilizacion_total_km_recorrido = (string)$this->movilizacion_total_km_recorrido; 
              $this->movilizacion_recorrido_vehiculo = (strpos(strtolower($this->movilizacion_recorrido_vehiculo), "e")) ? (float)$this->movilizacion_recorrido_vehiculo : $this->movilizacion_recorrido_vehiculo; 
              $this->movilizacion_recorrido_vehiculo = (string)$this->movilizacion_recorrido_vehiculo; 
              $this->movilizacion_excedente = (strpos(strtolower($this->movilizacion_excedente), "e")) ? (float)$this->movilizacion_excedente : $this->movilizacion_excedente; 
              $this->movilizacion_excedente = (string)$this->movilizacion_excedente; 
              $this->movilizacion_total_galones = (strpos(strtolower($this->movilizacion_total_galones), "e")) ? (float)$this->movilizacion_total_galones : $this->movilizacion_total_galones; 
              $this->movilizacion_total_galones = (string)$this->movilizacion_total_galones; 
              $this->movilizacion_total_combustible = (strpos(strtolower($this->movilizacion_total_combustible), "e")) ? (float)$this->movilizacion_total_combustible : $this->movilizacion_total_combustible; 
              $this->movilizacion_total_combustible = (string)$this->movilizacion_total_combustible; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['parms'] = "id_movilizacion?#?$this->id_movilizacion?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] < $qt_geral_reg_form_movilizacion_impresion_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->id_movilizacion = "";  
              $this->nmgp_dados_form["id_movilizacion"] = $this->id_movilizacion;
              $this->idvehiculo = "";  
              $this->nmgp_dados_form["idvehiculo"] = $this->idvehiculo;
              $this->idusuario = "";  
              $this->nmgp_dados_form["idusuario"] = $this->idusuario;
              $this->movilizacion_funcionario = "";  
              $this->nmgp_dados_form["movilizacion_funcionario"] = $this->movilizacion_funcionario;
              $this->movilizacion_fecha =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["movilizacion_fecha"] = $this->movilizacion_fecha;
              $this->movilizacion_ruta = "";  
              $this->nmgp_dados_form["movilizacion_ruta"] = $this->movilizacion_ruta;
              $this->movilizacion_hora_salida = "";  
              $this->movilizacion_hora_salida_hora = "" ;  
              $this->nmgp_dados_form["movilizacion_hora_salida"] = $this->movilizacion_hora_salida;
              $this->movilizacion_hora_llegada = "";  
              $this->movilizacion_hora_llegada_hora = "" ;  
              $this->nmgp_dados_form["movilizacion_hora_llegada"] = $this->movilizacion_hora_llegada;
              $this->movilizacion_km_salida = "";  
              $this->nmgp_dados_form["movilizacion_km_salida"] = $this->movilizacion_km_salida;
              $this->movilizacion_km_llegada = "";  
              $this->nmgp_dados_form["movilizacion_km_llegada"] = $this->movilizacion_km_llegada;
              $this->movilizacion_costo_galon = "";  
              $this->nmgp_dados_form["movilizacion_costo_galon"] = $this->movilizacion_costo_galon;
              $this->movilizacion_cant_km_adicional = "";  
              $this->nmgp_dados_form["movilizacion_cant_km_adicional"] = $this->movilizacion_cant_km_adicional;
              $this->movilizacion_total_km_recorrido = "";  
              $this->nmgp_dados_form["movilizacion_total_km_recorrido"] = $this->movilizacion_total_km_recorrido;
              $this->movilizacion_recorrido_vehiculo = "";  
              $this->nmgp_dados_form["movilizacion_recorrido_vehiculo"] = $this->movilizacion_recorrido_vehiculo;
              $this->movilizacion_excedente = "";  
              $this->nmgp_dados_form["movilizacion_excedente"] = $this->movilizacion_excedente;
              $this->movilizacion_total_galones = "";  
              $this->nmgp_dados_form["movilizacion_total_galones"] = $this->movilizacion_total_galones;
              $this->movilizacion_total_combustible = "";  
              $this->nmgp_dados_form["movilizacion_total_combustible"] = $this->movilizacion_total_combustible;
              $this->km_galon = "";  
              $this->nmgp_dados_form["km_galon"] = $this->km_galon;
              $this->detalle_movilizacion = "";  
              $this->nmgp_dados_form["detalle_movilizacion"] = $this->detalle_movilizacion;
              $this->nmgp_dados_form["libre"] = $this->libre;
              $this->nmgp_dados_form["libre2"] = $this->libre2;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dados_select'];
                  $this->idvehiculo = $this->nmgp_dados_select['idvehiculo'];  
                  $this->idusuario = $this->nmgp_dados_select['idusuario'];  
                  $this->movilizacion_funcionario = $this->nmgp_dados_select['movilizacion_funcionario'];  
                  $this->movilizacion_fecha = $this->nmgp_dados_select['movilizacion_fecha'];  
                  $this->movilizacion_ruta = $this->nmgp_dados_select['movilizacion_ruta'];  
                  $this->movilizacion_hora_salida = $this->nmgp_dados_select['movilizacion_hora_salida'];  
                  $this->movilizacion_hora_llegada = $this->nmgp_dados_select['movilizacion_hora_llegada'];  
                  $this->movilizacion_km_salida = $this->nmgp_dados_select['movilizacion_km_salida'];  
                  $this->movilizacion_km_llegada = $this->nmgp_dados_select['movilizacion_km_llegada'];  
                  $this->movilizacion_costo_galon = $this->nmgp_dados_select['movilizacion_costo_galon'];  
                  $this->movilizacion_cant_km_adicional = $this->nmgp_dados_select['movilizacion_cant_km_adicional'];  
                  $this->movilizacion_total_km_recorrido = $this->nmgp_dados_select['movilizacion_total_km_recorrido'];  
                  $this->movilizacion_recorrido_vehiculo = $this->nmgp_dados_select['movilizacion_recorrido_vehiculo'];  
                  $this->movilizacion_excedente = $this->nmgp_dados_select['movilizacion_excedente'];  
                  $this->movilizacion_total_galones = $this->nmgp_dados_select['movilizacion_total_galones'];  
                  $this->movilizacion_total_combustible = $this->nmgp_dados_select['movilizacion_total_combustible'];  
                  $this->detalle_movilizacion = $this->nmgp_dados_select['detalle_movilizacion'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
      $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_parms'] = "NM_btn_insert*scinN*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function Movilizacion_Km_Llegada_onChange()
{
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'on';
  
$original_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
$original_movilizacion_km_llegada = $this->movilizacion_km_llegada;
$original_movilizacion_km_salida = $this->movilizacion_km_salida;

$this->movilizacion_recorrido_vehiculo =$this->movilizacion_km_llegada -$this->movilizacion_km_salida ;

$modificado_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
$modificado_movilizacion_km_llegada = $this->movilizacion_km_llegada;
$modificado_movilizacion_km_salida = $this->movilizacion_km_salida;
$this->nm_formatar_campos('movilizacion_recorrido_vehiculo', 'movilizacion_km_llegada', 'movilizacion_km_salida');
if ($original_movilizacion_recorrido_vehiculo !== $modificado_movilizacion_recorrido_vehiculo || isset($this->nmgp_cmp_readonly['movilizacion_recorrido_vehiculo']) || (isset($bFlagRead_movilizacion_recorrido_vehiculo) && $bFlagRead_movilizacion_recorrido_vehiculo))
{
    $this->ajax_return_values_movilizacion_recorrido_vehiculo(true);
}
if ($original_movilizacion_km_llegada !== $modificado_movilizacion_km_llegada || isset($this->nmgp_cmp_readonly['movilizacion_km_llegada']) || (isset($bFlagRead_movilizacion_km_llegada) && $bFlagRead_movilizacion_km_llegada))
{
    $this->ajax_return_values_movilizacion_km_llegada(true);
}
if ($original_movilizacion_km_salida !== $modificado_movilizacion_km_salida || isset($this->nmgp_cmp_readonly['movilizacion_km_salida']) || (isset($bFlagRead_movilizacion_km_salida) && $bFlagRead_movilizacion_km_salida))
{
    $this->ajax_return_values_movilizacion_km_salida(true);
}
$this->NM_ajax_info['event_field'] = 'Movilizacion';
form_movilizacion_impresion_mob_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'off';
}
function idusuario_onClick()
{
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'on';
  
$original_idusuario = $this->idusuario;
$original_movilizacion_km_salida = $this->movilizacion_km_salida;
$original_idvehiculo = $this->idvehiculo;

$check_sql = "SELECT Vehiculo_Km_Inicial
FROM usuario, vehiculos
WHERE vehiculos.usuario_idusuario = '".$this->idusuario ."'
AND usuario.idusuario = vehiculos.usuario_idusuario";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
	{
		$this->movilizacion_km_salida  = $this->rs[0][0];
	}
	else{
			$this->movilizacion_km_salida  = '';
		}


$kilometraje = " SELECT IdVehiculo, Concat('Modelo: ',vehiculos.Vehiculo_Modelo,'---Placa: ',vehiculos.Vehiculo_Placa), Vehiculo_Km_Inicial  
FROM usuario, vehiculos
WHERE vehiculos.usuario_idusuario = '" . $this->idusuario  . "'
AND usuario.idusuario = vehiculos.usuario_idusuario";
		 
      $nm_select = $kilometraje; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs_kilometraje = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs_kilometraje[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs_kilometraje = false;
          $this->rs_kilometraje_erro = $this->Db->ErrorMsg();
      } 
;

		if (isset($this->rs_kilometraje[0][0]))     
			{
				$this->idvehiculo  = $this->rs_kilometraje[0][0];
			}
			else{
					$this->idvehiculo  = '';
				}



$modificado_idusuario = $this->idusuario;
$modificado_movilizacion_km_salida = $this->movilizacion_km_salida;
$modificado_idvehiculo = $this->idvehiculo;
$this->nm_formatar_campos('idusuario', 'movilizacion_km_salida', 'idvehiculo');
if ($original_idusuario !== $modificado_idusuario || isset($this->nmgp_cmp_readonly['idusuario']) || (isset($bFlagRead_idusuario) && $bFlagRead_idusuario))
{
    $this->ajax_return_values_idusuario(true);
}
if ($original_movilizacion_km_salida !== $modificado_movilizacion_km_salida || isset($this->nmgp_cmp_readonly['movilizacion_km_salida']) || (isset($bFlagRead_movilizacion_km_salida) && $bFlagRead_movilizacion_km_salida))
{
    $this->ajax_return_values_movilizacion_km_salida(true);
}
if ($original_idvehiculo !== $modificado_idvehiculo || isset($this->nmgp_cmp_readonly['idvehiculo']) || (isset($bFlagRead_idvehiculo) && $bFlagRead_idvehiculo))
{
    $this->ajax_return_values_idvehiculo(true);
}
$this->NM_ajax_info['event_field'] = 'idusuario';
form_movilizacion_impresion_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'off';
}
function kilometraje()
{
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'on';
  
$update_sql = "UPDATE vehiculos set Vehiculo_Km_Inicial = ".$this->movilizacion_km_llegada ." where IdVehiculo = ".$this->idvehiculo ."";

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_movilizacion_impresion_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['form_movilizacion_impresion_mob']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_movilizacion_impresion_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_movilizacion_impresion_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_idusuario()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'] = array(); 
    }

   $old_value_id_movilizacion = $this->id_movilizacion;
   $old_value_movilizacion_fecha = $this->movilizacion_fecha;
   $old_value_idvehiculo = $this->idvehiculo;
   $old_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $old_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $old_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $old_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $old_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $old_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $old_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $old_value_movilizacion_excedente = $this->movilizacion_excedente;
   $old_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $old_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $old_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_movilizacion = $this->id_movilizacion;
   $unformatted_value_movilizacion_fecha = $this->movilizacion_fecha;
   $unformatted_value_idvehiculo = $this->idvehiculo;
   $unformatted_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $unformatted_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $unformatted_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $unformatted_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $unformatted_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $unformatted_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $unformatted_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $unformatted_value_movilizacion_excedente = $this->movilizacion_excedente;
   $unformatted_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $unformatted_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $unformatted_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;

   $nm_comando = "SELECT idusuario, concat(usuario_apellidos,\" \",usuario_nombres)  FROM usuario, cargo WHERE  usuario.usuario_cargo = cargo.idcargo AND cargo.idcargo= 1 ORDER BY usuario_apellidos, usuario_nombres";

   $this->id_movilizacion = $old_value_id_movilizacion;
   $this->movilizacion_fecha = $old_value_movilizacion_fecha;
   $this->idvehiculo = $old_value_idvehiculo;
   $this->movilizacion_hora_salida = $old_value_movilizacion_hora_salida;
   $this->movilizacion_total_combustible = $old_value_movilizacion_total_combustible;
   $this->movilizacion_hora_llegada = $old_value_movilizacion_hora_llegada;
   $this->movilizacion_total_galones = $old_value_movilizacion_total_galones;
   $this->movilizacion_km_salida = $old_value_movilizacion_km_salida;
   $this->movilizacion_cant_km_adicional = $old_value_movilizacion_cant_km_adicional;
   $this->movilizacion_km_llegada = $old_value_movilizacion_km_llegada;
   $this->movilizacion_excedente = $old_value_movilizacion_excedente;
   $this->movilizacion_recorrido_vehiculo = $old_value_movilizacion_recorrido_vehiculo;
   $this->movilizacion_total_km_recorrido = $old_value_movilizacion_total_km_recorrido;
   $this->movilizacion_costo_galon = $old_value_movilizacion_costo_galon;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_movilizacion_funcionario()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'] = array(); 
    }

   $old_value_id_movilizacion = $this->id_movilizacion;
   $old_value_movilizacion_fecha = $this->movilizacion_fecha;
   $old_value_idvehiculo = $this->idvehiculo;
   $old_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $old_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $old_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $old_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $old_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $old_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $old_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $old_value_movilizacion_excedente = $this->movilizacion_excedente;
   $old_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $old_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $old_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_movilizacion = $this->id_movilizacion;
   $unformatted_value_movilizacion_fecha = $this->movilizacion_fecha;
   $unformatted_value_idvehiculo = $this->idvehiculo;
   $unformatted_value_movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $unformatted_value_movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $unformatted_value_movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $unformatted_value_movilizacion_total_galones = $this->movilizacion_total_galones;
   $unformatted_value_movilizacion_km_salida = $this->movilizacion_km_salida;
   $unformatted_value_movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $unformatted_value_movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $unformatted_value_movilizacion_excedente = $this->movilizacion_excedente;
   $unformatted_value_movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $unformatted_value_movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $unformatted_value_movilizacion_costo_galon = $this->movilizacion_costo_galon;

   $nm_comando = "SELECT idusuario, concat(usuario_apellidos,' ',usuario_nombres)  FROM usuario  WHERE usuario_cargo <> 1 ORDER BY usuario_apellidos, usuario_nombres";

   $this->id_movilizacion = $old_value_id_movilizacion;
   $this->movilizacion_fecha = $old_value_movilizacion_fecha;
   $this->idvehiculo = $old_value_idvehiculo;
   $this->movilizacion_hora_salida = $old_value_movilizacion_hora_salida;
   $this->movilizacion_total_combustible = $old_value_movilizacion_total_combustible;
   $this->movilizacion_hora_llegada = $old_value_movilizacion_hora_llegada;
   $this->movilizacion_total_galones = $old_value_movilizacion_total_galones;
   $this->movilizacion_km_salida = $old_value_movilizacion_km_salida;
   $this->movilizacion_cant_km_adicional = $old_value_movilizacion_cant_km_adicional;
   $this->movilizacion_km_llegada = $old_value_movilizacion_km_llegada;
   $this->movilizacion_excedente = $old_value_movilizacion_excedente;
   $this->movilizacion_recorrido_vehiculo = $old_value_movilizacion_recorrido_vehiculo;
   $this->movilizacion_total_km_recorrido = $old_value_movilizacion_total_km_recorrido;
   $this->movilizacion_costo_galon = $old_value_movilizacion_costo_galon;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_movilizacion_impresion_mob_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Id_Movilizacion", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Movilizacion_Ruta", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Movilizacion_Km_Salida", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Movilizacion_Km_Llegada", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Movilizacion_Costo_Galon", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Movilizacion_Total_Km_Recorrido", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "movilizacion_Recorrido_Vehiculo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "movilizacion_Excedente", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Movilizacion_Total_Galones", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter_form'] . " and (Id_Movilizacion = " . $_SESSION['Movilizacion_id'] . ") and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where Id_Movilizacion = " . $_SESSION['Movilizacion_id'] . " and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_movilizacion_impresion_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total'] = $qt_geral_reg_form_movilizacion_impresion_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_movilizacion_impresion_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_movilizacion_impresion_mob_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id_movilizacion";$nm_numeric[] = "idvehiculo";$nm_numeric[] = "idusuario";$nm_numeric[] = "movilizacion_km_salida";$nm_numeric[] = "movilizacion_km_llegada";$nm_numeric[] = "movilizacion_costo_galon";$nm_numeric[] = "movilizacion_cant_km_adicional";$nm_numeric[] = "movilizacion_total_km_recorrido";$nm_numeric[] = "movilizacion_recorrido_vehiculo";$nm_numeric[] = "movilizacion_excedente";$nm_numeric[] = "movilizacion_total_galones";$nm_numeric[] = "movilizacion_total_combustible";$nm_numeric[] = "";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['movilizacion_fecha'] = "date";$Nm_datas['movilizacion_hora_salida'] = "time";$Nm_datas['movilizacion_hora_llegada'] = "time";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_movilizacion_impresion_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_movilizacion_impresion_mob_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_movilizacion_impresion_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/sys__NM__ico__NM__favicons_ame_nuevo.png">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
