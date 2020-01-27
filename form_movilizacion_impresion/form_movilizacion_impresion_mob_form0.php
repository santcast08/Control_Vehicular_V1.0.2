<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Reporte Hoja de Rutas y Control de Combustible y Kilometraje"); } else { echo strip_tags("Reporte Hoja de Rutas y Control de Combustible y Kilometraje"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/sys__NM__ico__NM__favicons_ame_nuevo.png">
<?php
header("X-XSS-Protection: 1; mode=block");
?>
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_movilizacion_impresion/form_movilizacion_impresion_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_movilizacion_impresion_mob_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_binicio_off = "<?php echo $this->arr_buttons['binicio_off']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bavanca_off = "<?php echo $this->arr_buttons['bavanca_off']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bretorna_off = "<?php echo $this->arr_buttons['bretorna_off']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_bfinal_off  = "<?php echo $this->arr_buttons['bfinal_off']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).show();
       $("#sc_b_ini_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ini_" + str_pos).show();
       $("#gbl_sc_b_ini_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).show();
       $("#sc_b_ret_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_ret_" + str_pos).show();
       $("#gbl_sc_b_ret_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).hide();
       $("#sc_b_ini_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ini_" + str_pos).hide();
       $("#gbl_sc_b_ini_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).hide();
       $("#sc_b_ret_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_ret_" + str_pos).hide();
       $("#gbl_sc_b_ret_off_" + str_pos).show();
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).show();
       $("#sc_b_fim_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_fim_" + str_pos).show();
       $("#gbl_sc_b_fim_off_" + str_pos).hide();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).show();
       $("#sc_b_avc_off_" + str_pos).hide().prop("disabled", false);
       $("#gbl_sc_b_avc_" + str_pos).show();
       $("#gbl_sc_b_avc_off_" + str_pos).hide();
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).hide();
       $("#sc_b_fim_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_fim_" + str_pos).hide();
       $("#gbl_sc_b_fim_off_" + str_pos).show();
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).hide();
       $("#sc_b_avc_off_" + str_pos).prop("disabled", true).show();
       $("#gbl_sc_b_avc_" + str_pos).hide();
       $("#gbl_sc_b_avc_off_" + str_pos).show();
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
<?php

include_once('form_movilizacion_impresion_mob_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
<script type="text/javascript">
function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
     $(".scBtnGrpClick").mouseup(function(){
          event.preventDefault();
          if($(this).find("a").prop('href') != '')
          {
              $(this).find("a").click();
          }
          else
          {
              eval($(this).find("a").prop('onclick'));
          }
  });
  scJQElementsAdd('');

  scJQGeneralAdd();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_detalle_movilizacion_impresion", $($("#nmsc_iframe_liga_form_detalle_movilizacion_impresion")[0].contentWindow.document).innerHeight());
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['recarga'];
}
     if ('' != $this->idvehiculo)
     {
         $this->lookup_idvehiculo($look_rpc_idvehiculo);
         $look_rpc_idvehiculo =  str_replace('<', '&lt;', $look_rpc_idvehiculo);
     }
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_movilizacion_impresion']['error_buffer']) && '' != $_SESSION['scriptcase']['form_movilizacion_impresion']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_movilizacion_impresion']['error_buffer'];
}

?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_movilizacion_impresion_mob_js0.php");
?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
<script type="text/javascript"> 
 // Adiciona um elemento
 //----------------------
 function nm_add_sel(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem selecionado e valido
   if (oOrig.options[i].selected && !oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = oOrig.options[i].text;
    sValue = oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 // Adiciona todos os elementos
 //-----------------------------
 function nm_add_all(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem valido
   if (!oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = oOrig.options[i].text;
    sValue = oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 // Remove um elemento
 //--------------------
 function nm_del_sel(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove itens selecionados na origem
  for (i = oOrig.length - 1; i >= 0; i--)
  {
   // Item na origem selecionado
   if (oOrig.options[i].selected)
   {
    aSel[j] = oOrig.options[i].value;
    atxt[j] = oOrig.options[i].text;
    j++;
    oOrig.options[i] = null;
   }
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 // Remove todos os elementos
 //---------------------------
 function nm_del_all(sOrig, sDest, fCBack, sRow)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove todos os itens na origem
  while (0 < oOrig.length)
  {
   i       = oOrig.length - 1;
   aSel[j] = oOrig.options[i].value;
   atxt[j] = oOrig.options[i].text;
   j++;
   oOrig.options[i] = null;
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (fCBack)
  {
   fCBack(sRow);
  }
 }
 function nm_sincroniza(sOrig, sDest)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOrig];
  oDest = document.F1.elements[sDest];
  // Varre itens do destino
  for (i = 0; i < oDest.length; i++)
  {
     dValue = oDest.options[i].value;
     bFound = false;
     for (x = 0; x < oOrig.length && !bFound; x++)
     {
         oValue = oOrig.options[x].value;
         if (dValue == oValue)
         {
             // Desabilita item na origem
             oOrig.options[x].style.color = "#A0A0A0";
             oOrig.options[x].disabled    = true;
             oOrig.options[x].selected    = false;
             bFound = true;
         }
     }
  }
 }
 var nm_quant_pack;
 function nm_pack(sOrig, sDest)
 {
    if (!document.F1.elements[sOrig] || !document.F1.elements[sDest]) return;
    obj_sel = document.F1.elements[sOrig];
    str_val = "";
    nm_quant_pack = 0;
    for (i = 0; i < obj_sel.length; i++)
    {
         if ("" != str_val)
         {
             str_val += "@?@";
             nm_quant_pack++;
         }
         str_val += obj_sel.options[i].value;
    }
    document.F1.elements[sDest].value = str_val;
 }
 function nm_pack_sel(sOrig, sDest)
 {
    if (!document.F1.elements[sOrig] || !document.F1.elements[sDest]) return;
    obj_sel = document.F1.elements[sOrig];
    str_val = "";
    nm_quant_pack = 0;
    for (i = 0; i < obj_sel.length; i++)
    {
         if (obj_sel.options[i].selected)
         {
             if ("" != str_val)
             {
                 str_val += "@?@";
                 nm_quant_pack++;
             }
             str_val += obj_sel.options[i].value;
         }
    }
    document.F1.elements[sDest].value = str_val;
 }
 function nm_del_combo(sOcombo)
 {
  // Recupera objetos
  oOrig = document.F1.elements[sOcombo];
  aSel  = new Array();
  j     = 0;
  // Remove todos os itens na origem
  while (0 < oOrig.length)
  {
   i       = oOrig.length - 1;
   aSel[j] = oOrig.options[i].value;
   j++;
   oOrig.options[i] = null;
  }
 }
 function nm_add_item(sDest, sText, sValue, sSelected)
 {
  oDest = document.F1.elements[sDest];
  oDest.options[oDest.length] = new Option(sText, sValue);
  if (sSelected == 'selected')
  {
      oDest.options[oDest.length -1].selected = true;
  }
 }
 function in_array(aArray, sElem)
 {
  for (iCount = 0; iCount < aArray.length; iCount++)
  {
   if (sElem == aArray[iCount])
   {
    return true;
   }
  }
  return false;
 }
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
 </script>
<form  name="F1" method="post" 
               action="form_movilizacion_impresion_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_movilizacion_impresion_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_movilizacion_impresion_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
#lin1_col1 { font-size:22px; width:500px; color: #FFFFFF; }
#lin1_col2 { font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:right; color: #FFFFFF;  }
#lin2_col1 { font-family:Arial, Helvetica, sans-serif; font-weight:bold; font-size:15px; }
#lin2_col2 { font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:right; color: #FFFFFF;  }

</style>

<table width="100%" height="67px" class="scFormHeader">
        <tr>
                <td width="5px"></td>
        <td width="67px" class="scFormHeaderFont"><IMG SRC="<?php echo $this->Ini->path_imag_cab ?>/sys__NM__img__NM__LOGOTIPO AME 2013 16.png" BORDER="0"/></td>
               <td class="scFormHeaderFont"><span id="lin1_col1"><?php echo "Control Vehicular" ?></span><br /><span id="lin2_col1"><?php if ($this->nmgp_opcao == "novo") { echo "Reporte Hoja de Rutas y Control de Combustible y Kilometraje"; } else { echo "Reporte Hoja de Rutas y Control de Combustible y Kilometraje"; } ?></span></td>
               <td align="right" class="scFormHeaderFont"><span  id="lin1_col2"><?php echo date($this->dateDefaultFormat()); ?></span><br /><span id="lin2_col2"></span></td>
        <td width="5px"></td>
    </tr>
</table>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
?>
<table style="border-collapse: collapse; border-width: 0; display: none; position: absolute; z-index: 1000" class="SC_SubMenuButton" id="sc_btgp_div_group_2_t">
 <tr><td class="scBtnGrpBackground">
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-11", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-12", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_sai_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "sc-unique-btn-13", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-14", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Delete)", "sc-unique-btn-15", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + C)", "sc-unique-btn-17", "", "group_2_t");?>
  </div>
 
<?php
        $NM_btn = true;
    }
?>
 </td></tr>
</table>
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-18", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-19", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-20", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-21", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-22", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_movilizacion']))
           {
               $this->nmgp_cmp_readonly['id_movilizacion'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_fecha']))
           {
               $this->nmgp_cmp_readonly['movilizacion_fecha'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['id_movilizacion']))
    {
        $this->nm_new_label['id_movilizacion'] = "Numero de la Movilización";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_movilizacion = $this->id_movilizacion;
   $sStyleHidden_id_movilizacion = '';
   if (isset($this->nmgp_cmp_hidden['id_movilizacion']) && $this->nmgp_cmp_hidden['id_movilizacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_movilizacion']);
       $sStyleHidden_id_movilizacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_movilizacion = 'display: none;';
   $sStyleReadInp_id_movilizacion = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_movilizacion"]) &&  $this->nmgp_cmp_readonly["id_movilizacion"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_movilizacion']);
       $sStyleReadLab_id_movilizacion = '';
       $sStyleReadInp_id_movilizacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_movilizacion']) && $this->nmgp_cmp_hidden['id_movilizacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_movilizacion" value="<?php echo $this->form_encode_input($id_movilizacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOdd css_id_movilizacion_line" id="hidden_field_data_id_movilizacion" style="<?php echo $sStyleHidden_id_movilizacion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id_movilizacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_id_movilizacion_label"><span id="id_label_id_movilizacion"><?php echo $this->nm_new_label['id_movilizacion']; ?></span></span><br><span id="id_read_on_id_movilizacion" class="css_id_movilizacion_line" style="<?php echo $sStyleReadLab_id_movilizacion; ?>"><?php echo $this->form_encode_input($this->id_movilizacion); ?></span><span id="id_read_off_id_movilizacion" style="<?php echo $sStyleReadInp_id_movilizacion; ?>"><input type="hidden" name="id_movilizacion" value="<?php echo $this->form_encode_input($id_movilizacion) . "\">"?><span id="id_ajax_label_id_movilizacion"><?php echo nl2br($id_movilizacion); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_movilizacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_movilizacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idusuario']))
           {
               $this->nmgp_cmp_readonly['idusuario'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_fecha']))
    {
        $this->nm_new_label['movilizacion_fecha'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_fecha = $this->movilizacion_fecha;
   $sStyleHidden_movilizacion_fecha = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_fecha']) && $this->nmgp_cmp_hidden['movilizacion_fecha'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_fecha']);
       $sStyleHidden_movilizacion_fecha = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_fecha = 'display: none;';
   $sStyleReadInp_movilizacion_fecha = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_fecha"]) &&  $this->nmgp_cmp_readonly["movilizacion_fecha"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_fecha']);
       $sStyleReadLab_movilizacion_fecha = '';
       $sStyleReadInp_movilizacion_fecha = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_fecha']) && $this->nmgp_cmp_hidden['movilizacion_fecha'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_fecha" value="<?php echo $this->form_encode_input($movilizacion_fecha) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_fecha_line" id="hidden_field_data_movilizacion_fecha" style="<?php echo $sStyleHidden_movilizacion_fecha; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_fecha_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_fecha_label"><span id="id_label_movilizacion_fecha"><?php echo $this->nm_new_label['movilizacion_fecha']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_fecha"]) &&  $this->nmgp_cmp_readonly["movilizacion_fecha"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_fecha" value="<?php echo $this->form_encode_input($movilizacion_fecha) . "\"><span id=\"id_ajax_label_movilizacion_fecha\">" . $movilizacion_fecha . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_fecha" class="sc-ui-readonly-movilizacion_fecha css_movilizacion_fecha_line" style="<?php echo $sStyleReadLab_movilizacion_fecha; ?>"><?php echo $this->form_encode_input($movilizacion_fecha); ?></span><span id="id_read_off_movilizacion_fecha" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_fecha; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_fecha_obj" style="" id="id_sc_field_movilizacion_fecha" type=text name="movilizacion_fecha" value="<?php echo $this->form_encode_input($movilizacion_fecha) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['movilizacion_fecha']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['movilizacion_fecha']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['movilizacion_fecha']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_fecha_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_fecha_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['idvehiculo']))
           {
               $this->nmgp_cmp_readonly['idvehiculo'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['idusuario']))
   {
       $this->nm_new_label['idusuario'] = "Conductor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idusuario = $this->idusuario;
   $sStyleHidden_idusuario = '';
   if (isset($this->nmgp_cmp_hidden['idusuario']) && $this->nmgp_cmp_hidden['idusuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idusuario']);
       $sStyleHidden_idusuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idusuario = 'display: none;';
   $sStyleReadInp_idusuario = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idusuario"]) &&  $this->nmgp_cmp_readonly["idusuario"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idusuario']);
       $sStyleReadLab_idusuario = '';
       $sStyleReadInp_idusuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idusuario']) && $this->nmgp_cmp_hidden['idusuario'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="idusuario" value="<?php echo $this->form_encode_input($this->idusuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idusuario_line" id="hidden_field_data_idusuario" style="<?php echo $sStyleHidden_idusuario; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idusuario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idusuario_label"><span id="id_label_idusuario"><?php echo $this->nm_new_label['idusuario']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["idusuario"]) &&  $this->nmgp_cmp_readonly["idusuario"] == "on")) { 
 
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
   $x = 0; 
   $idusuario_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idusuario_1))
          {
              foreach ($this->idusuario_1 as $tmp_idusuario)
              {
                  if (trim($tmp_idusuario) === trim($cadaselect[1])) { $idusuario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idusuario) === trim($cadaselect[1])) { $idusuario_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="idusuario" value="<?php echo $this->form_encode_input($idusuario) . "\"><span id=\"id_ajax_label_idusuario\">" . $idusuario_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_idusuario();
   $x = 0 ; 
   $idusuario_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->idusuario_1))
          {
              foreach ($this->idusuario_1 as $tmp_idusuario)
              {
                  if (trim($tmp_idusuario) === trim($cadaselect[1])) { $idusuario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->idusuario) === trim($cadaselect[1])) { $idusuario_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($idusuario_look))
          {
              $idusuario_look = $this->idusuario;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_idusuario\" class=\"css_idusuario_line\" style=\"" .  $sStyleReadLab_idusuario . "\">" . $this->form_encode_input($idusuario_look) . "</span><span id=\"id_read_off_idusuario\" style=\"" . $sStyleReadInp_idusuario . "\">";
   echo " <span id=\"idAjaxSelect_idusuario\"><select class=\"sc-js-input scFormObjectOdd css_idusuario_obj\" style=\"\" id=\"id_sc_field_idusuario\" name=\"idusuario\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_idusuario'][] = ''; 
   echo "  <option value=\"\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->idusuario) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->idusuario)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idusuario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idusuario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_funcionario']))
           {
               $this->nmgp_cmp_readonly['movilizacion_funcionario'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['idvehiculo']))
    {
        $this->nm_new_label['idvehiculo'] = "Vehiculo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $idvehiculo = $this->idvehiculo;
   $sStyleHidden_idvehiculo = '';
   if (isset($this->nmgp_cmp_hidden['idvehiculo']) && $this->nmgp_cmp_hidden['idvehiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['idvehiculo']);
       $sStyleHidden_idvehiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_idvehiculo = 'display: none;';
   $sStyleReadInp_idvehiculo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["idvehiculo"]) &&  $this->nmgp_cmp_readonly["idvehiculo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['idvehiculo']);
       $sStyleReadLab_idvehiculo = '';
       $sStyleReadInp_idvehiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['idvehiculo']) && $this->nmgp_cmp_hidden['idvehiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="idvehiculo" value="<?php echo $this->form_encode_input($idvehiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_idvehiculo_line" id="hidden_field_data_idvehiculo" style="<?php echo $sStyleHidden_idvehiculo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_idvehiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_idvehiculo_label"><span id="id_label_idvehiculo"><?php echo $this->nm_new_label['idvehiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["idvehiculo"]) &&  $this->nmgp_cmp_readonly["idvehiculo"] == "on")) { 

 ?>
<input type="hidden" name="idvehiculo" value="<?php echo $this->form_encode_input($idvehiculo) . "\"><span id=\"id_ajax_label_idvehiculo\">" . $idvehiculo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_idvehiculo" class="sc-ui-readonly-idvehiculo css_idvehiculo_line" style="<?php echo $sStyleReadLab_idvehiculo; ?>"><?php echo $this->form_encode_input($this->idvehiculo); ?></span><span id="id_read_off_idvehiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_idvehiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_idvehiculo_obj" style="" id="id_sc_field_idvehiculo" type=text name="idvehiculo" value="<?php echo $this->form_encode_input($idvehiculo) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['idvehiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['idvehiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['idvehiculo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 <SPAN id="id_lookup_idvehiculo"><?php echo $look_rpc_idvehiculo; ?></SPAN></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_idvehiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_idvehiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_idvehiculo_dumb = ('' == $sStyleHidden_idvehiculo) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_idvehiculo_dumb" style="<?php echo $sStyleHidden_idvehiculo_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_hora_salida']))
           {
               $this->nmgp_cmp_readonly['movilizacion_hora_salida'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['movilizacion_funcionario']))
   {
       $this->nm_new_label['movilizacion_funcionario'] = "Funcionario";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_funcionario = $this->movilizacion_funcionario;
   $sStyleHidden_movilizacion_funcionario = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_funcionario']) && $this->nmgp_cmp_hidden['movilizacion_funcionario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_funcionario']);
       $sStyleHidden_movilizacion_funcionario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_funcionario = 'display: none;';
   $sStyleReadInp_movilizacion_funcionario = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_funcionario"]) &&  $this->nmgp_cmp_readonly["movilizacion_funcionario"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_funcionario']);
       $sStyleReadLab_movilizacion_funcionario = '';
       $sStyleReadInp_movilizacion_funcionario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_funcionario']) && $this->nmgp_cmp_hidden['movilizacion_funcionario'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="movilizacion_funcionario" value="<?php echo $this->form_encode_input($this->movilizacion_funcionario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_funcionario_line" id="hidden_field_data_movilizacion_funcionario" style="<?php echo $sStyleHidden_movilizacion_funcionario; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_funcionario_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_funcionario_label"><span id="id_label_movilizacion_funcionario"><?php echo $this->nm_new_label['movilizacion_funcionario']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_funcionario"]) &&  $this->nmgp_cmp_readonly["movilizacion_funcionario"] == "on")) { 
 
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
   $x = 0; 
   $movilizacion_funcionario_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->movilizacion_funcionario_1))
          {
              foreach ($this->movilizacion_funcionario_1 as $tmp_movilizacion_funcionario)
              {
                  if (trim($tmp_movilizacion_funcionario) === trim($cadaselect[1])) { $movilizacion_funcionario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->movilizacion_funcionario) === trim($cadaselect[1])) { $movilizacion_funcionario_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="movilizacion_funcionario" value="<?php echo $this->form_encode_input($movilizacion_funcionario) . "\"><span id=\"id_ajax_label_movilizacion_funcionario\">" . $movilizacion_funcionario_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_movilizacion_funcionario();
   $x = 0 ; 
   $movilizacion_funcionario_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->movilizacion_funcionario_1))
          {
              foreach ($this->movilizacion_funcionario_1 as $tmp_movilizacion_funcionario)
              {
                  if (trim($tmp_movilizacion_funcionario) === trim($cadaselect[1])) { $movilizacion_funcionario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->movilizacion_funcionario) === trim($cadaselect[1])) { $movilizacion_funcionario_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($movilizacion_funcionario_look))
          {
              $movilizacion_funcionario_look = $this->movilizacion_funcionario;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_movilizacion_funcionario\" class=\"css_movilizacion_funcionario_line\" style=\"" .  $sStyleReadLab_movilizacion_funcionario . "\">" . $this->form_encode_input($movilizacion_funcionario_look) . "</span><span id=\"id_read_off_movilizacion_funcionario\" style=\"" . $sStyleReadInp_movilizacion_funcionario . "\">";
   echo " <span id=\"idAjaxSelect_movilizacion_funcionario\"><select class=\"sc-js-input scFormObjectOdd css_movilizacion_funcionario_obj\" style=\"\" id=\"id_sc_field_movilizacion_funcionario\" name=\"movilizacion_funcionario\" size=\"10\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['Lookup_movilizacion_funcionario'][] = ''; 
   echo "  <option value=\"\">Seleccione</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->movilizacion_funcionario) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->movilizacion_funcionario)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_funcionario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_funcionario_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_movilizacion_funcionario_dumb = ('' == $sStyleHidden_movilizacion_funcionario) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_movilizacion_funcionario_dumb" style="<?php echo $sStyleHidden_movilizacion_funcionario_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_total_combustible']))
           {
               $this->nmgp_cmp_readonly['movilizacion_total_combustible'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_hora_salida']))
    {
        $this->nm_new_label['movilizacion_hora_salida'] = "Hora de Salida";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_hora_salida = $this->movilizacion_hora_salida;
   $sStyleHidden_movilizacion_hora_salida = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_hora_salida']) && $this->nmgp_cmp_hidden['movilizacion_hora_salida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_hora_salida']);
       $sStyleHidden_movilizacion_hora_salida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_hora_salida = 'display: none;';
   $sStyleReadInp_movilizacion_hora_salida = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_hora_salida"]) &&  $this->nmgp_cmp_readonly["movilizacion_hora_salida"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_hora_salida']);
       $sStyleReadLab_movilizacion_hora_salida = '';
       $sStyleReadInp_movilizacion_hora_salida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_hora_salida']) && $this->nmgp_cmp_hidden['movilizacion_hora_salida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_hora_salida" value="<?php echo $this->form_encode_input($movilizacion_hora_salida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_hora_salida_line" id="hidden_field_data_movilizacion_hora_salida" style="<?php echo $sStyleHidden_movilizacion_hora_salida; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_hora_salida_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_hora_salida_label"><span id="id_label_movilizacion_hora_salida"><?php echo $this->nm_new_label['movilizacion_hora_salida']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_hora_salida"]) &&  $this->nmgp_cmp_readonly["movilizacion_hora_salida"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_hora_salida" value="<?php echo $this->form_encode_input($movilizacion_hora_salida) . "\"><span id=\"id_ajax_label_movilizacion_hora_salida\">" . $movilizacion_hora_salida . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_hora_salida" class="sc-ui-readonly-movilizacion_hora_salida css_movilizacion_hora_salida_line" style="<?php echo $sStyleReadLab_movilizacion_hora_salida; ?>"><?php echo $this->form_encode_input($movilizacion_hora_salida); ?></span><span id="id_read_off_movilizacion_hora_salida" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_hora_salida; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_hora_salida_obj" style="" id="id_sc_field_movilizacion_hora_salida" type=text name="movilizacion_hora_salida" value="<?php echo $this->form_encode_input($movilizacion_hora_salida) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['movilizacion_hora_salida']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['movilizacion_hora_salida']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['movilizacion_hora_salida']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_hora_salida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_hora_salida_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_hora_llegada']))
           {
               $this->nmgp_cmp_readonly['movilizacion_hora_llegada'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_total_combustible']))
    {
        $this->nm_new_label['movilizacion_total_combustible'] = "Costo Total de Combustible";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_total_combustible = $this->movilizacion_total_combustible;
   $sStyleHidden_movilizacion_total_combustible = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_total_combustible']) && $this->nmgp_cmp_hidden['movilizacion_total_combustible'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_total_combustible']);
       $sStyleHidden_movilizacion_total_combustible = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_total_combustible = 'display: none;';
   $sStyleReadInp_movilizacion_total_combustible = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_total_combustible"]) &&  $this->nmgp_cmp_readonly["movilizacion_total_combustible"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_total_combustible']);
       $sStyleReadLab_movilizacion_total_combustible = '';
       $sStyleReadInp_movilizacion_total_combustible = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_total_combustible']) && $this->nmgp_cmp_hidden['movilizacion_total_combustible'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_total_combustible" value="<?php echo $this->form_encode_input($movilizacion_total_combustible) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_total_combustible_line" id="hidden_field_data_movilizacion_total_combustible" style="<?php echo $sStyleHidden_movilizacion_total_combustible; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_total_combustible_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_total_combustible_label"><span id="id_label_movilizacion_total_combustible"><?php echo $this->nm_new_label['movilizacion_total_combustible']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_total_combustible"]) &&  $this->nmgp_cmp_readonly["movilizacion_total_combustible"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_total_combustible" value="<?php echo $this->form_encode_input($movilizacion_total_combustible) . "\"><span id=\"id_ajax_label_movilizacion_total_combustible\">" . $movilizacion_total_combustible . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_total_combustible" class="sc-ui-readonly-movilizacion_total_combustible css_movilizacion_total_combustible_line" style="<?php echo $sStyleReadLab_movilizacion_total_combustible; ?>"><?php echo $this->form_encode_input($this->movilizacion_total_combustible); ?></span><span id="id_read_off_movilizacion_total_combustible" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_total_combustible; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_total_combustible_obj" style="" id="id_sc_field_movilizacion_total_combustible" type=text name="movilizacion_total_combustible" value="<?php echo $this->form_encode_input($movilizacion_total_combustible) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['movilizacion_total_combustible']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['movilizacion_total_combustible']['format_pos'] || 3 == $this->field_config['movilizacion_total_combustible']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['movilizacion_total_combustible']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['movilizacion_total_combustible']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_total_combustible']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_total_combustible_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_total_combustible_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_total_galones']))
           {
               $this->nmgp_cmp_readonly['movilizacion_total_galones'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_hora_llegada']))
    {
        $this->nm_new_label['movilizacion_hora_llegada'] = "Hora de Llegada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_hora_llegada = $this->movilizacion_hora_llegada;
   $sStyleHidden_movilizacion_hora_llegada = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_hora_llegada']) && $this->nmgp_cmp_hidden['movilizacion_hora_llegada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_hora_llegada']);
       $sStyleHidden_movilizacion_hora_llegada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_hora_llegada = 'display: none;';
   $sStyleReadInp_movilizacion_hora_llegada = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_hora_llegada"]) &&  $this->nmgp_cmp_readonly["movilizacion_hora_llegada"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_hora_llegada']);
       $sStyleReadLab_movilizacion_hora_llegada = '';
       $sStyleReadInp_movilizacion_hora_llegada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_hora_llegada']) && $this->nmgp_cmp_hidden['movilizacion_hora_llegada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_hora_llegada" value="<?php echo $this->form_encode_input($movilizacion_hora_llegada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_hora_llegada_line" id="hidden_field_data_movilizacion_hora_llegada" style="<?php echo $sStyleHidden_movilizacion_hora_llegada; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_hora_llegada_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_hora_llegada_label"><span id="id_label_movilizacion_hora_llegada"><?php echo $this->nm_new_label['movilizacion_hora_llegada']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_hora_llegada"]) &&  $this->nmgp_cmp_readonly["movilizacion_hora_llegada"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_hora_llegada" value="<?php echo $this->form_encode_input($movilizacion_hora_llegada) . "\"><span id=\"id_ajax_label_movilizacion_hora_llegada\">" . $movilizacion_hora_llegada . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_hora_llegada" class="sc-ui-readonly-movilizacion_hora_llegada css_movilizacion_hora_llegada_line" style="<?php echo $sStyleReadLab_movilizacion_hora_llegada; ?>"><?php echo $this->form_encode_input($movilizacion_hora_llegada); ?></span><span id="id_read_off_movilizacion_hora_llegada" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_hora_llegada; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_hora_llegada_obj" style="" id="id_sc_field_movilizacion_hora_llegada" type=text name="movilizacion_hora_llegada" value="<?php echo $this->form_encode_input($movilizacion_hora_llegada) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['movilizacion_hora_llegada']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['movilizacion_hora_llegada']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['movilizacion_hora_llegada']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_hora_llegada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_hora_llegada_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_km_salida']))
           {
               $this->nmgp_cmp_readonly['movilizacion_km_salida'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_total_galones']))
    {
        $this->nm_new_label['movilizacion_total_galones'] = "Total Galones Usados";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_total_galones = $this->movilizacion_total_galones;
   $sStyleHidden_movilizacion_total_galones = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_total_galones']) && $this->nmgp_cmp_hidden['movilizacion_total_galones'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_total_galones']);
       $sStyleHidden_movilizacion_total_galones = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_total_galones = 'display: none;';
   $sStyleReadInp_movilizacion_total_galones = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_total_galones"]) &&  $this->nmgp_cmp_readonly["movilizacion_total_galones"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_total_galones']);
       $sStyleReadLab_movilizacion_total_galones = '';
       $sStyleReadInp_movilizacion_total_galones = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_total_galones']) && $this->nmgp_cmp_hidden['movilizacion_total_galones'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_total_galones" value="<?php echo $this->form_encode_input($movilizacion_total_galones) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_total_galones_line" id="hidden_field_data_movilizacion_total_galones" style="<?php echo $sStyleHidden_movilizacion_total_galones; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_total_galones_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_total_galones_label"><span id="id_label_movilizacion_total_galones"><?php echo $this->nm_new_label['movilizacion_total_galones']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_total_galones"]) &&  $this->nmgp_cmp_readonly["movilizacion_total_galones"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_total_galones" value="<?php echo $this->form_encode_input($movilizacion_total_galones) . "\"><span id=\"id_ajax_label_movilizacion_total_galones\">" . $movilizacion_total_galones . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_total_galones" class="sc-ui-readonly-movilizacion_total_galones css_movilizacion_total_galones_line" style="<?php echo $sStyleReadLab_movilizacion_total_galones; ?>"><?php echo $this->form_encode_input($this->movilizacion_total_galones); ?></span><span id="id_read_off_movilizacion_total_galones" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_total_galones; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_total_galones_obj" style="" id="id_sc_field_movilizacion_total_galones" type=text name="movilizacion_total_galones" value="<?php echo $this->form_encode_input($movilizacion_total_galones) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 12, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['movilizacion_total_galones']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['movilizacion_total_galones']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_total_galones']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_total_galones_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_total_galones_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_cant_km_adicional']))
           {
               $this->nmgp_cmp_readonly['movilizacion_cant_km_adicional'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_km_salida']))
    {
        $this->nm_new_label['movilizacion_km_salida'] = "Kilometraje de Salida";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_km_salida = $this->movilizacion_km_salida;
   $sStyleHidden_movilizacion_km_salida = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_km_salida']) && $this->nmgp_cmp_hidden['movilizacion_km_salida'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_km_salida']);
       $sStyleHidden_movilizacion_km_salida = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_km_salida = 'display: none;';
   $sStyleReadInp_movilizacion_km_salida = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_km_salida"]) &&  $this->nmgp_cmp_readonly["movilizacion_km_salida"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_km_salida']);
       $sStyleReadLab_movilizacion_km_salida = '';
       $sStyleReadInp_movilizacion_km_salida = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_km_salida']) && $this->nmgp_cmp_hidden['movilizacion_km_salida'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_km_salida" value="<?php echo $this->form_encode_input($movilizacion_km_salida) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_km_salida_line" id="hidden_field_data_movilizacion_km_salida" style="<?php echo $sStyleHidden_movilizacion_km_salida; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_km_salida_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_km_salida_label"><span id="id_label_movilizacion_km_salida"><?php echo $this->nm_new_label['movilizacion_km_salida']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_km_salida"]) &&  $this->nmgp_cmp_readonly["movilizacion_km_salida"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_km_salida" value="<?php echo $this->form_encode_input($movilizacion_km_salida) . "\"><span id=\"id_ajax_label_movilizacion_km_salida\">" . $movilizacion_km_salida . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_km_salida" class="sc-ui-readonly-movilizacion_km_salida css_movilizacion_km_salida_line" style="<?php echo $sStyleReadLab_movilizacion_km_salida; ?>"><?php echo $this->form_encode_input($this->movilizacion_km_salida); ?></span><span id="id_read_off_movilizacion_km_salida" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_km_salida; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_km_salida_obj" style="" id="id_sc_field_movilizacion_km_salida" type=text name="movilizacion_km_salida" value="<?php echo $this->form_encode_input($movilizacion_km_salida) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['movilizacion_km_salida']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_km_salida']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_km_salida_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_km_salida_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_km_llegada']))
           {
               $this->nmgp_cmp_readonly['movilizacion_km_llegada'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_cant_km_adicional']))
    {
        $this->nm_new_label['movilizacion_cant_km_adicional'] = "Cantidad de Kilometraje Adicional";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_cant_km_adicional = $this->movilizacion_cant_km_adicional;
   $sStyleHidden_movilizacion_cant_km_adicional = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_cant_km_adicional']) && $this->nmgp_cmp_hidden['movilizacion_cant_km_adicional'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_cant_km_adicional']);
       $sStyleHidden_movilizacion_cant_km_adicional = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_cant_km_adicional = 'display: none;';
   $sStyleReadInp_movilizacion_cant_km_adicional = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_cant_km_adicional"]) &&  $this->nmgp_cmp_readonly["movilizacion_cant_km_adicional"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_cant_km_adicional']);
       $sStyleReadLab_movilizacion_cant_km_adicional = '';
       $sStyleReadInp_movilizacion_cant_km_adicional = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_cant_km_adicional']) && $this->nmgp_cmp_hidden['movilizacion_cant_km_adicional'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_cant_km_adicional" value="<?php echo $this->form_encode_input($movilizacion_cant_km_adicional) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_cant_km_adicional_line" id="hidden_field_data_movilizacion_cant_km_adicional" style="<?php echo $sStyleHidden_movilizacion_cant_km_adicional; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_cant_km_adicional_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_cant_km_adicional_label"><span id="id_label_movilizacion_cant_km_adicional"><?php echo $this->nm_new_label['movilizacion_cant_km_adicional']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_cant_km_adicional"]) &&  $this->nmgp_cmp_readonly["movilizacion_cant_km_adicional"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_cant_km_adicional" value="<?php echo $this->form_encode_input($movilizacion_cant_km_adicional) . "\"><span id=\"id_ajax_label_movilizacion_cant_km_adicional\">" . $movilizacion_cant_km_adicional . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_cant_km_adicional" class="sc-ui-readonly-movilizacion_cant_km_adicional css_movilizacion_cant_km_adicional_line" style="<?php echo $sStyleReadLab_movilizacion_cant_km_adicional; ?>"><?php echo $this->form_encode_input($this->movilizacion_cant_km_adicional); ?></span><span id="id_read_off_movilizacion_cant_km_adicional" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_cant_km_adicional; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_cant_km_adicional_obj" style="" id="id_sc_field_movilizacion_cant_km_adicional" type=text name="movilizacion_cant_km_adicional" value="<?php echo $this->form_encode_input($movilizacion_cant_km_adicional) ?>"
 size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['movilizacion_cant_km_adicional']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['movilizacion_cant_km_adicional']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_cant_km_adicional']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_cant_km_adicional_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_cant_km_adicional_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_excedente']))
           {
               $this->nmgp_cmp_readonly['movilizacion_excedente'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_km_llegada']))
    {
        $this->nm_new_label['movilizacion_km_llegada'] = "Kilometraje de Llegada";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_km_llegada = $this->movilizacion_km_llegada;
   $sStyleHidden_movilizacion_km_llegada = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_km_llegada']) && $this->nmgp_cmp_hidden['movilizacion_km_llegada'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_km_llegada']);
       $sStyleHidden_movilizacion_km_llegada = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_km_llegada = 'display: none;';
   $sStyleReadInp_movilizacion_km_llegada = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_km_llegada"]) &&  $this->nmgp_cmp_readonly["movilizacion_km_llegada"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_km_llegada']);
       $sStyleReadLab_movilizacion_km_llegada = '';
       $sStyleReadInp_movilizacion_km_llegada = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_km_llegada']) && $this->nmgp_cmp_hidden['movilizacion_km_llegada'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_km_llegada" value="<?php echo $this->form_encode_input($movilizacion_km_llegada) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_km_llegada_line" id="hidden_field_data_movilizacion_km_llegada" style="<?php echo $sStyleHidden_movilizacion_km_llegada; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_km_llegada_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_km_llegada_label"><span id="id_label_movilizacion_km_llegada"><?php echo $this->nm_new_label['movilizacion_km_llegada']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_km_llegada"]) &&  $this->nmgp_cmp_readonly["movilizacion_km_llegada"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_km_llegada" value="<?php echo $this->form_encode_input($movilizacion_km_llegada) . "\"><span id=\"id_ajax_label_movilizacion_km_llegada\">" . $movilizacion_km_llegada . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_km_llegada" class="sc-ui-readonly-movilizacion_km_llegada css_movilizacion_km_llegada_line" style="<?php echo $sStyleReadLab_movilizacion_km_llegada; ?>"><?php echo $this->form_encode_input($this->movilizacion_km_llegada); ?></span><span id="id_read_off_movilizacion_km_llegada" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_km_llegada; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_km_llegada_obj" style="" id="id_sc_field_movilizacion_km_llegada" type=text name="movilizacion_km_llegada" value="<?php echo $this->form_encode_input($movilizacion_km_llegada) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['movilizacion_km_llegada']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_km_llegada']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_km_llegada_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_km_llegada_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_recorrido_vehiculo']))
           {
               $this->nmgp_cmp_readonly['movilizacion_recorrido_vehiculo'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_excedente']))
    {
        $this->nm_new_label['movilizacion_excedente'] = "Excedente";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_excedente = $this->movilizacion_excedente;
   $sStyleHidden_movilizacion_excedente = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_excedente']) && $this->nmgp_cmp_hidden['movilizacion_excedente'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_excedente']);
       $sStyleHidden_movilizacion_excedente = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_excedente = 'display: none;';
   $sStyleReadInp_movilizacion_excedente = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_excedente"]) &&  $this->nmgp_cmp_readonly["movilizacion_excedente"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_excedente']);
       $sStyleReadLab_movilizacion_excedente = '';
       $sStyleReadInp_movilizacion_excedente = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_excedente']) && $this->nmgp_cmp_hidden['movilizacion_excedente'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_excedente" value="<?php echo $this->form_encode_input($movilizacion_excedente) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_excedente_line" id="hidden_field_data_movilizacion_excedente" style="<?php echo $sStyleHidden_movilizacion_excedente; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_excedente_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_excedente_label"><span id="id_label_movilizacion_excedente"><?php echo $this->nm_new_label['movilizacion_excedente']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_excedente"]) &&  $this->nmgp_cmp_readonly["movilizacion_excedente"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_excedente" value="<?php echo $this->form_encode_input($movilizacion_excedente) . "\"><span id=\"id_ajax_label_movilizacion_excedente\">" . $movilizacion_excedente . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_excedente" class="sc-ui-readonly-movilizacion_excedente css_movilizacion_excedente_line" style="<?php echo $sStyleReadLab_movilizacion_excedente; ?>"><?php echo $this->form_encode_input($this->movilizacion_excedente); ?></span><span id="id_read_off_movilizacion_excedente" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_excedente; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_excedente_obj" style="" id="id_sc_field_movilizacion_excedente" type=text name="movilizacion_excedente" value="<?php echo $this->form_encode_input($movilizacion_excedente) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['movilizacion_excedente']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['movilizacion_excedente']['symbol_fmt']; ?>, allowNegative: true, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_excedente']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_excedente_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_excedente_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_total_km_recorrido']))
           {
               $this->nmgp_cmp_readonly['movilizacion_total_km_recorrido'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_recorrido_vehiculo']))
    {
        $this->nm_new_label['movilizacion_recorrido_vehiculo'] = "Kilometros Recorridos por el Vehículo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_recorrido_vehiculo = $this->movilizacion_recorrido_vehiculo;
   $sStyleHidden_movilizacion_recorrido_vehiculo = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo']) && $this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo']);
       $sStyleHidden_movilizacion_recorrido_vehiculo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_recorrido_vehiculo = 'display: none;';
   $sStyleReadInp_movilizacion_recorrido_vehiculo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_recorrido_vehiculo"]) &&  $this->nmgp_cmp_readonly["movilizacion_recorrido_vehiculo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_recorrido_vehiculo']);
       $sStyleReadLab_movilizacion_recorrido_vehiculo = '';
       $sStyleReadInp_movilizacion_recorrido_vehiculo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo']) && $this->nmgp_cmp_hidden['movilizacion_recorrido_vehiculo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_recorrido_vehiculo" value="<?php echo $this->form_encode_input($movilizacion_recorrido_vehiculo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_recorrido_vehiculo_line" id="hidden_field_data_movilizacion_recorrido_vehiculo" style="<?php echo $sStyleHidden_movilizacion_recorrido_vehiculo; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_recorrido_vehiculo_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_recorrido_vehiculo_label"><span id="id_label_movilizacion_recorrido_vehiculo"><?php echo $this->nm_new_label['movilizacion_recorrido_vehiculo']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_recorrido_vehiculo"]) &&  $this->nmgp_cmp_readonly["movilizacion_recorrido_vehiculo"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_recorrido_vehiculo" value="<?php echo $this->form_encode_input($movilizacion_recorrido_vehiculo) . "\"><span id=\"id_ajax_label_movilizacion_recorrido_vehiculo\">" . $movilizacion_recorrido_vehiculo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_recorrido_vehiculo" class="sc-ui-readonly-movilizacion_recorrido_vehiculo css_movilizacion_recorrido_vehiculo_line" style="<?php echo $sStyleReadLab_movilizacion_recorrido_vehiculo; ?>"><?php echo $this->form_encode_input($this->movilizacion_recorrido_vehiculo); ?></span><span id="id_read_off_movilizacion_recorrido_vehiculo" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_recorrido_vehiculo; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_recorrido_vehiculo_obj" style="" id="id_sc_field_movilizacion_recorrido_vehiculo" type=text name="movilizacion_recorrido_vehiculo" value="<?php echo $this->form_encode_input($movilizacion_recorrido_vehiculo) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['movilizacion_recorrido_vehiculo']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['movilizacion_recorrido_vehiculo']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_recorrido_vehiculo']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_recorrido_vehiculo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_recorrido_vehiculo_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['movilizacion_costo_galon']))
           {
               $this->nmgp_cmp_readonly['movilizacion_costo_galon'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_total_km_recorrido']))
    {
        $this->nm_new_label['movilizacion_total_km_recorrido'] = "Total Kilometraje Recorrido";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_total_km_recorrido = $this->movilizacion_total_km_recorrido;
   $sStyleHidden_movilizacion_total_km_recorrido = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_total_km_recorrido']) && $this->nmgp_cmp_hidden['movilizacion_total_km_recorrido'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_total_km_recorrido']);
       $sStyleHidden_movilizacion_total_km_recorrido = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_total_km_recorrido = 'display: none;';
   $sStyleReadInp_movilizacion_total_km_recorrido = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_total_km_recorrido"]) &&  $this->nmgp_cmp_readonly["movilizacion_total_km_recorrido"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_total_km_recorrido']);
       $sStyleReadLab_movilizacion_total_km_recorrido = '';
       $sStyleReadInp_movilizacion_total_km_recorrido = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_total_km_recorrido']) && $this->nmgp_cmp_hidden['movilizacion_total_km_recorrido'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_total_km_recorrido" value="<?php echo $this->form_encode_input($movilizacion_total_km_recorrido) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_total_km_recorrido_line" id="hidden_field_data_movilizacion_total_km_recorrido" style="<?php echo $sStyleHidden_movilizacion_total_km_recorrido; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_total_km_recorrido_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_total_km_recorrido_label"><span id="id_label_movilizacion_total_km_recorrido"><?php echo $this->nm_new_label['movilizacion_total_km_recorrido']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_total_km_recorrido"]) &&  $this->nmgp_cmp_readonly["movilizacion_total_km_recorrido"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_total_km_recorrido" value="<?php echo $this->form_encode_input($movilizacion_total_km_recorrido) . "\"><span id=\"id_ajax_label_movilizacion_total_km_recorrido\">" . $movilizacion_total_km_recorrido . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_total_km_recorrido" class="sc-ui-readonly-movilizacion_total_km_recorrido css_movilizacion_total_km_recorrido_line" style="<?php echo $sStyleReadLab_movilizacion_total_km_recorrido; ?>"><?php echo $this->form_encode_input($this->movilizacion_total_km_recorrido); ?></span><span id="id_read_off_movilizacion_total_km_recorrido" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_total_km_recorrido; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_total_km_recorrido_obj" style="" id="id_sc_field_movilizacion_total_km_recorrido" type=text name="movilizacion_total_km_recorrido" value="<?php echo $this->form_encode_input($movilizacion_total_km_recorrido) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['movilizacion_total_km_recorrido']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['movilizacion_total_km_recorrido']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_total_km_recorrido']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_total_km_recorrido_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_total_km_recorrido_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['movilizacion_costo_galon']))
    {
        $this->nm_new_label['movilizacion_costo_galon'] = "Valor del Combustible";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $movilizacion_costo_galon = $this->movilizacion_costo_galon;
   $sStyleHidden_movilizacion_costo_galon = '';
   if (isset($this->nmgp_cmp_hidden['movilizacion_costo_galon']) && $this->nmgp_cmp_hidden['movilizacion_costo_galon'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['movilizacion_costo_galon']);
       $sStyleHidden_movilizacion_costo_galon = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_movilizacion_costo_galon = 'display: none;';
   $sStyleReadInp_movilizacion_costo_galon = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["movilizacion_costo_galon"]) &&  $this->nmgp_cmp_readonly["movilizacion_costo_galon"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['movilizacion_costo_galon']);
       $sStyleReadLab_movilizacion_costo_galon = '';
       $sStyleReadInp_movilizacion_costo_galon = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['movilizacion_costo_galon']) && $this->nmgp_cmp_hidden['movilizacion_costo_galon'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="movilizacion_costo_galon" value="<?php echo $this->form_encode_input($movilizacion_costo_galon) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_movilizacion_costo_galon_line" id="hidden_field_data_movilizacion_costo_galon" style="<?php echo $sStyleHidden_movilizacion_costo_galon; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_movilizacion_costo_galon_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_movilizacion_costo_galon_label"><span id="id_label_movilizacion_costo_galon"><?php echo $this->nm_new_label['movilizacion_costo_galon']; ?></span></span><br>
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["movilizacion_costo_galon"]) &&  $this->nmgp_cmp_readonly["movilizacion_costo_galon"] == "on")) { 

 ?>
<input type="hidden" name="movilizacion_costo_galon" value="<?php echo $this->form_encode_input($movilizacion_costo_galon) . "\"><span id=\"id_ajax_label_movilizacion_costo_galon\">" . $movilizacion_costo_galon . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_movilizacion_costo_galon" class="sc-ui-readonly-movilizacion_costo_galon css_movilizacion_costo_galon_line" style="<?php echo $sStyleReadLab_movilizacion_costo_galon; ?>"><?php echo $this->form_encode_input($this->movilizacion_costo_galon); ?></span><span id="id_read_off_movilizacion_costo_galon" style="white-space: nowrap;<?php echo $sStyleReadInp_movilizacion_costo_galon; ?>">
 <input class="sc-js-input scFormObjectOdd css_movilizacion_costo_galon_obj" style="" id="id_sc_field_movilizacion_costo_galon" type=text name="movilizacion_costo_galon" value="<?php echo $this->form_encode_input($movilizacion_costo_galon) ?>"
 size=12 alt="{datatype: 'decimal', maxLength: 3, precision: 2, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['movilizacion_costo_galon']['symbol_dec']); ?>', thousandsSep: '', thousandsFormat: <?php echo $this->field_config['movilizacion_costo_galon']['symbol_fmt']; ?>, manualDecimals: true, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['movilizacion_costo_galon']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_movilizacion_costo_galon_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_movilizacion_costo_galon_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_movilizacion_costo_galon_dumb = ('' == $sStyleHidden_movilizacion_costo_galon) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_movilizacion_costo_galon_dumb" style="<?php echo $sStyleHidden_movilizacion_costo_galon_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detalle_movilizacion']))
    {
        $this->nm_new_label['detalle_movilizacion'] = "Ingreso de Rutas de la Movilización";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detalle_movilizacion = $this->detalle_movilizacion;
   $sStyleHidden_detalle_movilizacion = '';
   if (isset($this->nmgp_cmp_hidden['detalle_movilizacion']) && $this->nmgp_cmp_hidden['detalle_movilizacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detalle_movilizacion']);
       $sStyleHidden_detalle_movilizacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detalle_movilizacion = 'display: none;';
   $sStyleReadInp_detalle_movilizacion = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detalle_movilizacion']) && $this->nmgp_cmp_readonly['detalle_movilizacion'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detalle_movilizacion']);
       $sStyleReadLab_detalle_movilizacion = '';
       $sStyleReadInp_detalle_movilizacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detalle_movilizacion']) && $this->nmgp_cmp_hidden['detalle_movilizacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detalle_movilizacion" value="<?php echo $this->form_encode_input($detalle_movilizacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detalle_movilizacion_line" id="hidden_field_data_detalle_movilizacion" style="<?php echo $sStyleHidden_detalle_movilizacion; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detalle_movilizacion_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_detalle_movilizacion_label"><span id="id_label_detalle_movilizacion"><?php echo $this->nm_new_label['detalle_movilizacion']; ?></span></span><br>
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_liga_form_insert'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['embutida_parms'] = "NM_btn_insert*scinN*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['foreign_key']['id_movilizacion'] = $this->nmgp_dados_form['id_movilizacion'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['where_filter'] = "Id_Movilizacion = " . $this->nmgp_dados_form['id_movilizacion'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['where_detal']  = "Id_Movilizacion = " . $this->nmgp_dados_form['id_movilizacion'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_movilizacion_impresion_mob']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_movilizacion_impresion_mob_empty.htm' : $this->Ini->link_form_detalle_movilizacion_impresion_mob_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
 foreach ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion_mob'] as $i => $v)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init'] ]['form_detalle_movilizacion_impresion'][$i] = $v;
 }
if (isset($this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion']) && 'nmsc_iframe_liga_form_detalle_movilizacion_impresion_mob' != $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['form_detalle_movilizacion_impresion_mob_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_detalle_movilizacion'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_detalle_movilizacion_impresion_mob"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_detalle_movilizacion_impresion_mob"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detalle_movilizacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detalle_movilizacion_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-23", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-24", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-25", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-26", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-27", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-28", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-29", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-30", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['masterValue']))
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
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_movilizacion_impresion_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_movilizacion_impresion_mob");
 parent.scAjaxDetailHeight("form_movilizacion_impresion_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_movilizacion_impresion_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_movilizacion_impresion_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_movilizacion_impresion_mob", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
?>
<script type="text/javascript">
_scAjaxShowMessage(scMsgDefTitle, "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", false, sc_ajaxMsgTime, false, "Ok", 0, 0, 0, 0, "", "", "", false, true);
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script>
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<script type="text/javascript">
	function scBtnFn_imprimir() {
		if ($("#sc_imprimir_top").length && $("#sc_imprimir_top").is(":visible")) {
			sc_btn_imprimir()
			 return;
		}
	}
	function scBtnFn_sys_format_pdf() {
		if ($("#sc_b_pdf_t.sc-unique-btn-1").length && $("#sc_b_pdf_t.sc-unique-btn-1").is(":visible")) {
			tb_show('', "<?php echo  $this->Ini->path_link . SC_dir_app_name('form_movilizacion_impresion')  ?>/form_movilizacion_impresion_config_pdf.php?nm_opc=pdf&nm_target=2&nm_cor=cor&papel=8&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=800&conf_larg=10&conf_fonte=N&grafico=XX&language=es&conf_socor=N&KeepThis=true&TB_iframe=true&modal=true");
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-2").length && $("#sc_b_ini_b.sc-unique-btn-2").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_off_b.sc-unique-btn-3").length && $("#sc_b_ini_off_b.sc-unique-btn-3").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_b.sc-unique-btn-23").length && $("#sc_b_ini_b.sc-unique-btn-23").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_off_b.sc-unique-btn-24").length && $("#sc_b_ini_off_b.sc-unique-btn-24").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-4").length && $("#sc_b_ret_b.sc-unique-btn-4").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_off_b.sc-unique-btn-5").length && $("#sc_b_ret_off_b.sc-unique-btn-5").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_b.sc-unique-btn-25").length && $("#sc_b_ret_b.sc-unique-btn-25").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_off_b.sc-unique-btn-26").length && $("#sc_b_ret_off_b.sc-unique-btn-26").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-6").length && $("#sc_b_avc_b.sc-unique-btn-6").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_off_b.sc-unique-btn-7").length && $("#sc_b_avc_off_b.sc-unique-btn-7").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_b.sc-unique-btn-27").length && $("#sc_b_avc_b.sc-unique-btn-27").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_off_b.sc-unique-btn-28").length && $("#sc_b_avc_off_b.sc-unique-btn-28").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-8").length && $("#sc_b_fim_b.sc-unique-btn-8").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_off_b.sc-unique-btn-9").length && $("#sc_b_fim_off_b.sc-unique-btn-9").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_b.sc-unique-btn-29").length && $("#sc_b_fim_b.sc-unique-btn-29").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_off_b.sc-unique-btn-30").length && $("#sc_b_fim_off_b.sc-unique-btn-30").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_sai_modal() {
		if ($("#sc_b_sai_b.sc-unique-btn-10").length && $("#sc_b_sai_b.sc-unique-btn-10").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-11").length && $("#sc_b_new_t.sc-unique-btn-11").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-12").length && $("#sc_b_ins_t.sc-unique-btn-12").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-13").length && $("#sc_b_sai_t.sc-unique-btn-13").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-14").length && $("#sc_b_upd_t.sc-unique-btn-14").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-15").length && $("#sc_b_del_t.sc-unique-btn-15").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-16").length && $("#sys_separator.sc-unique-btn-16").is(":visible")) {
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-17").length && $("#sc_b_clone_t.sc-unique-btn-17").is(":visible")) {
			nm_move ('clone');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-18").length && $("#sc_b_sai_t.sc-unique-btn-18").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-19").length && $("#sc_b_sai_t.sc-unique-btn-19").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-20").length && $("#sc_b_sai_t.sc-unique-btn-20").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-21").length && $("#sc_b_sai_t.sc-unique-btn-21").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-22").length && $("#sc_b_sai_t.sc-unique-btn-22").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
