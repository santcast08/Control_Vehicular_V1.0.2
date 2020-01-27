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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Reporte del mantenimiento Vehicular"); } else { echo strip_tags("Reporte del mantenimiento Vehicular"); } ?></TITLE>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['embutida_pdf']))
 {
 ?>
<?php
    if ((isset($this->nmgp_tipo_pdf) && $this->nmgp_tipo_pdf == "pb") || (isset($this->nmgp_cor_print) && $this->nmgp_cor_print == "PB"))
    {
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form_bw.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form_bw<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
    }
    else
    {
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
    }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_datos_vehiculo_reporte/form_datos_vehiculo_reporte_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_datos_vehiculo_reporte_sajax_js.php");
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
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_datos_vehiculo_reporte_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['recarga'];
}
?>
<body class="scFormPage" style="<?php echo $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
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
 include_once("form_datos_vehiculo_reporte_js0.php");
?>
<script type="text/javascript"> 
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
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_datos_vehiculo_reporte'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_datos_vehiculo_reporte'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['maximized']))
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
               <td class="scFormHeaderFont"><span id="lin1_col1"><?php echo "Control Vehicular" ?></span><br /><span id="lin2_col1"><?php if ($this->nmgp_opcao == "novo") { echo "Reporte del mantenimiento Vehicular"; } else { echo "Reporte del mantenimiento Vehicular"; } ?></span></td>
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
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['pdf_view'])
{
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['imprimir'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "imprimir", "scBtnFn_imprimir()", "scBtnFn_imprimir()", "sc_imprimir_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = ($this->nmgp_botoes['pdf'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bpdf", "scBtnFn_sys_format_pdf()", "scBtnFn_sys_format_pdf()", "sc_b_pdf_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['empty_filter'] = true;
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
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['usuario_idusuario']))
           {
               $this->nmgp_cmp_readonly['usuario_idusuario'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_numero_motor']))
           {
               $this->nmgp_cmp_readonly['vehiculo_numero_motor'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_placa']))
           {
               $this->nmgp_cmp_readonly['vehiculo_placa'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['usuario_idusuario']))
   {
       $this->nm_new_label['usuario_idusuario'] = "Conductor Actual del Vehículo";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $usuario_idusuario = $this->usuario_idusuario;
   $sStyleHidden_usuario_idusuario = '';
   if (isset($this->nmgp_cmp_hidden['usuario_idusuario']) && $this->nmgp_cmp_hidden['usuario_idusuario'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['usuario_idusuario']);
       $sStyleHidden_usuario_idusuario = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_usuario_idusuario = 'display: none;';
   $sStyleReadInp_usuario_idusuario = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["usuario_idusuario"]) &&  $this->nmgp_cmp_readonly["usuario_idusuario"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['usuario_idusuario']);
       $sStyleReadLab_usuario_idusuario = '';
       $sStyleReadInp_usuario_idusuario = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['usuario_idusuario']) && $this->nmgp_cmp_hidden['usuario_idusuario'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="usuario_idusuario" value="<?php echo $this->form_encode_input($this->usuario_idusuario) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_usuario_idusuario_label" id="hidden_field_label_usuario_idusuario" style="<?php echo $sStyleHidden_usuario_idusuario; ?>"><span id="id_label_usuario_idusuario"><?php echo $this->nm_new_label['usuario_idusuario']; ?></span></TD>
    <TD class="scFormDataOdd css_usuario_idusuario_line" id="hidden_field_data_usuario_idusuario" style="<?php echo $sStyleHidden_usuario_idusuario; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_usuario_idusuario_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["usuario_idusuario"]) &&  $this->nmgp_cmp_readonly["usuario_idusuario"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['Lookup_usuario_idusuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['Lookup_usuario_idusuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['Lookup_usuario_idusuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['Lookup_usuario_idusuario'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['Lookup_usuario_idusuario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['Lookup_usuario_idusuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['Lookup_usuario_idusuario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['Lookup_usuario_idusuario'] = array(); 
    }

   $old_value_vehiculo_km_galon = $this->vehiculo_km_galon;
   $old_value_vehiculo_km_inicial = $this->vehiculo_km_inicial;
   $old_value_vehiculo_fechaasignacion = $this->vehiculo_fechaasignacion;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_vehiculo_km_galon = $this->vehiculo_km_galon;
   $unformatted_value_vehiculo_km_inicial = $this->vehiculo_km_inicial;
   $unformatted_value_vehiculo_fechaasignacion = $this->vehiculo_fechaasignacion;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idusuario, usuario_nombres + ' ' + usuario_apellidos  FROM usuario  ORDER BY usuario_nombres, usuario_apellidos";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idusuario, concat(usuario_nombres,' ',usuario_apellidos)  FROM usuario  ORDER BY usuario_nombres, usuario_apellidos";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idusuario, usuario_nombres&' '&usuario_apellidos  FROM usuario  ORDER BY usuario_nombres, usuario_apellidos";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idusuario, usuario_nombres||' '||usuario_apellidos  FROM usuario  ORDER BY usuario_nombres, usuario_apellidos";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idusuario, usuario_nombres + ' ' + usuario_apellidos  FROM usuario  ORDER BY usuario_nombres, usuario_apellidos";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idusuario, usuario_nombres||' '||usuario_apellidos  FROM usuario  ORDER BY usuario_nombres, usuario_apellidos";
   }
   else
   {
       $nm_comando = "SELECT idusuario, usuario_nombres||' '||usuario_apellidos  FROM usuario  ORDER BY usuario_nombres, usuario_apellidos";
   }

   $this->vehiculo_km_galon = $old_value_vehiculo_km_galon;
   $this->vehiculo_km_inicial = $old_value_vehiculo_km_inicial;
   $this->vehiculo_fechaasignacion = $old_value_vehiculo_fechaasignacion;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['Lookup_usuario_idusuario'][] = $rs->fields[0];
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
   $usuario_idusuario_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->usuario_idusuario_1))
          {
              foreach ($this->usuario_idusuario_1 as $tmp_usuario_idusuario)
              {
                  if (trim($tmp_usuario_idusuario) === trim($cadaselect[1])) { $usuario_idusuario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->usuario_idusuario) === trim($cadaselect[1])) { $usuario_idusuario_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="usuario_idusuario" value="<?php echo $this->form_encode_input($usuario_idusuario) . "\"><span id=\"id_ajax_label_usuario_idusuario\">" . $usuario_idusuario_look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_usuario_idusuario();
   $x = 0 ; 
   $usuario_idusuario_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->usuario_idusuario_1))
          {
              foreach ($this->usuario_idusuario_1 as $tmp_usuario_idusuario)
              {
                  if (trim($tmp_usuario_idusuario) === trim($cadaselect[1])) { $usuario_idusuario_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->usuario_idusuario) === trim($cadaselect[1])) { $usuario_idusuario_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($usuario_idusuario_look))
          {
              $usuario_idusuario_look = $this->usuario_idusuario;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_usuario_idusuario\" class=\"css_usuario_idusuario_line\" style=\"" .  $sStyleReadLab_usuario_idusuario . "\">" . $this->form_encode_input($usuario_idusuario_look) . "</span><span id=\"id_read_off_usuario_idusuario\" style=\"" . $sStyleReadInp_usuario_idusuario . "\">";
   echo " <span id=\"idAjaxSelect_usuario_idusuario\"><select class=\"sc-js-input scFormObjectOdd css_usuario_idusuario_obj\" style=\"\" id=\"id_sc_field_usuario_idusuario\" name=\"usuario_idusuario\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->usuario_idusuario) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->usuario_idusuario)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usuario_idusuario_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usuario_idusuario_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['vehiculo_numero_motor']))
    {
        $this->nm_new_label['vehiculo_numero_motor'] = "Numero Motor";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_numero_motor = $this->vehiculo_numero_motor;
   $sStyleHidden_vehiculo_numero_motor = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_numero_motor']) && $this->nmgp_cmp_hidden['vehiculo_numero_motor'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_numero_motor']);
       $sStyleHidden_vehiculo_numero_motor = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_numero_motor = 'display: none;';
   $sStyleReadInp_vehiculo_numero_motor = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_numero_motor"]) &&  $this->nmgp_cmp_readonly["vehiculo_numero_motor"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_numero_motor']);
       $sStyleReadLab_vehiculo_numero_motor = '';
       $sStyleReadInp_vehiculo_numero_motor = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_numero_motor']) && $this->nmgp_cmp_hidden['vehiculo_numero_motor'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_numero_motor" value="<?php echo $this->form_encode_input($vehiculo_numero_motor) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_numero_motor_label" id="hidden_field_label_vehiculo_numero_motor" style="<?php echo $sStyleHidden_vehiculo_numero_motor; ?>"><span id="id_label_vehiculo_numero_motor"><?php echo $this->nm_new_label['vehiculo_numero_motor']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_numero_motor_line" id="hidden_field_data_vehiculo_numero_motor" style="<?php echo $sStyleHidden_vehiculo_numero_motor; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_numero_motor_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_numero_motor"]) &&  $this->nmgp_cmp_readonly["vehiculo_numero_motor"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_numero_motor" value="<?php echo $this->form_encode_input($vehiculo_numero_motor) . "\"><span id=\"id_ajax_label_vehiculo_numero_motor\">" . $vehiculo_numero_motor . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_numero_motor" class="sc-ui-readonly-vehiculo_numero_motor css_vehiculo_numero_motor_line" style="<?php echo $sStyleReadLab_vehiculo_numero_motor; ?>"><?php echo $this->form_encode_input($this->vehiculo_numero_motor); ?></span><span id="id_read_off_vehiculo_numero_motor" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_numero_motor; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_numero_motor_obj" style="" id="id_sc_field_vehiculo_numero_motor" type=text name="vehiculo_numero_motor" value="<?php echo $this->form_encode_input($vehiculo_numero_motor) ?>"
 size=50 maxlength=300 alt="{datatype: 'text', maxLength: 300, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_numero_motor_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_numero_motor_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_km_galon']))
           {
               $this->nmgp_cmp_readonly['vehiculo_km_galon'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_matricula']))
           {
               $this->nmgp_cmp_readonly['vehiculo_matricula'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['vehiculo_placa']))
    {
        $this->nm_new_label['vehiculo_placa'] = "Placa";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_placa = $this->vehiculo_placa;
   $sStyleHidden_vehiculo_placa = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_placa']) && $this->nmgp_cmp_hidden['vehiculo_placa'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_placa']);
       $sStyleHidden_vehiculo_placa = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_placa = 'display: none;';
   $sStyleReadInp_vehiculo_placa = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_placa"]) &&  $this->nmgp_cmp_readonly["vehiculo_placa"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_placa']);
       $sStyleReadLab_vehiculo_placa = '';
       $sStyleReadInp_vehiculo_placa = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_placa']) && $this->nmgp_cmp_hidden['vehiculo_placa'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_placa" value="<?php echo $this->form_encode_input($vehiculo_placa) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_placa_label" id="hidden_field_label_vehiculo_placa" style="<?php echo $sStyleHidden_vehiculo_placa; ?>"><span id="id_label_vehiculo_placa"><?php echo $this->nm_new_label['vehiculo_placa']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_placa_line" id="hidden_field_data_vehiculo_placa" style="<?php echo $sStyleHidden_vehiculo_placa; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_placa_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_placa"]) &&  $this->nmgp_cmp_readonly["vehiculo_placa"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_placa" value="<?php echo $this->form_encode_input($vehiculo_placa) . "\"><span id=\"id_ajax_label_vehiculo_placa\">" . $vehiculo_placa . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_placa" class="sc-ui-readonly-vehiculo_placa css_vehiculo_placa_line" style="<?php echo $sStyleReadLab_vehiculo_placa; ?>"><?php echo $this->form_encode_input($this->vehiculo_placa); ?></span><span id="id_read_off_vehiculo_placa" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_placa; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_placa_obj" style="" id="id_sc_field_vehiculo_placa" type=text name="vehiculo_placa" value="<?php echo $this->form_encode_input($vehiculo_placa) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_placa_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_placa_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['vehiculo_km_galon']))
    {
        $this->nm_new_label['vehiculo_km_galon'] = "Kilometraje por Galón";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_km_galon = $this->vehiculo_km_galon;
   $sStyleHidden_vehiculo_km_galon = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_km_galon']) && $this->nmgp_cmp_hidden['vehiculo_km_galon'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_km_galon']);
       $sStyleHidden_vehiculo_km_galon = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_km_galon = 'display: none;';
   $sStyleReadInp_vehiculo_km_galon = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_km_galon"]) &&  $this->nmgp_cmp_readonly["vehiculo_km_galon"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_km_galon']);
       $sStyleReadLab_vehiculo_km_galon = '';
       $sStyleReadInp_vehiculo_km_galon = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_km_galon']) && $this->nmgp_cmp_hidden['vehiculo_km_galon'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_km_galon" value="<?php echo $this->form_encode_input($vehiculo_km_galon) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_km_galon_label" id="hidden_field_label_vehiculo_km_galon" style="<?php echo $sStyleHidden_vehiculo_km_galon; ?>"><span id="id_label_vehiculo_km_galon"><?php echo $this->nm_new_label['vehiculo_km_galon']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_km_galon_line" id="hidden_field_data_vehiculo_km_galon" style="<?php echo $sStyleHidden_vehiculo_km_galon; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_km_galon_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_km_galon"]) &&  $this->nmgp_cmp_readonly["vehiculo_km_galon"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_km_galon" value="<?php echo $this->form_encode_input($vehiculo_km_galon) . "\"><span id=\"id_ajax_label_vehiculo_km_galon\">" . $vehiculo_km_galon . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_km_galon" class="sc-ui-readonly-vehiculo_km_galon css_vehiculo_km_galon_line" style="<?php echo $sStyleReadLab_vehiculo_km_galon; ?>"><?php echo $this->form_encode_input($this->vehiculo_km_galon); ?></span><span id="id_read_off_vehiculo_km_galon" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_km_galon; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_km_galon_obj" style="" id="id_sc_field_vehiculo_km_galon" type=text name="vehiculo_km_galon" value="<?php echo $this->form_encode_input($vehiculo_km_galon) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['vehiculo_km_galon']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['vehiculo_km_galon']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_km_galon_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_km_galon_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_km_inicial']))
           {
               $this->nmgp_cmp_readonly['vehiculo_km_inicial'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_marca']))
           {
               $this->nmgp_cmp_readonly['vehiculo_marca'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['vehiculo_matricula']))
    {
        $this->nm_new_label['vehiculo_matricula'] = "Matricula";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_matricula = $this->vehiculo_matricula;
   $sStyleHidden_vehiculo_matricula = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_matricula']) && $this->nmgp_cmp_hidden['vehiculo_matricula'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_matricula']);
       $sStyleHidden_vehiculo_matricula = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_matricula = 'display: none;';
   $sStyleReadInp_vehiculo_matricula = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_matricula"]) &&  $this->nmgp_cmp_readonly["vehiculo_matricula"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_matricula']);
       $sStyleReadLab_vehiculo_matricula = '';
       $sStyleReadInp_vehiculo_matricula = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_matricula']) && $this->nmgp_cmp_hidden['vehiculo_matricula'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_matricula" value="<?php echo $this->form_encode_input($vehiculo_matricula) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_matricula_label" id="hidden_field_label_vehiculo_matricula" style="<?php echo $sStyleHidden_vehiculo_matricula; ?>"><span id="id_label_vehiculo_matricula"><?php echo $this->nm_new_label['vehiculo_matricula']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_matricula_line" id="hidden_field_data_vehiculo_matricula" style="<?php echo $sStyleHidden_vehiculo_matricula; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_matricula_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_matricula"]) &&  $this->nmgp_cmp_readonly["vehiculo_matricula"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_matricula" value="<?php echo $this->form_encode_input($vehiculo_matricula) . "\"><span id=\"id_ajax_label_vehiculo_matricula\">" . $vehiculo_matricula . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_matricula" class="sc-ui-readonly-vehiculo_matricula css_vehiculo_matricula_line" style="<?php echo $sStyleReadLab_vehiculo_matricula; ?>"><?php echo $this->form_encode_input($this->vehiculo_matricula); ?></span><span id="id_read_off_vehiculo_matricula" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_matricula; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_matricula_obj" style="" id="id_sc_field_vehiculo_matricula" type=text name="vehiculo_matricula" value="<?php echo $this->form_encode_input($vehiculo_matricula) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_matricula_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_matricula_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['vehiculo_km_inicial']))
    {
        $this->nm_new_label['vehiculo_km_inicial'] = "Kilometraje ";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_km_inicial = $this->vehiculo_km_inicial;
   $sStyleHidden_vehiculo_km_inicial = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_km_inicial']) && $this->nmgp_cmp_hidden['vehiculo_km_inicial'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_km_inicial']);
       $sStyleHidden_vehiculo_km_inicial = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_km_inicial = 'display: none;';
   $sStyleReadInp_vehiculo_km_inicial = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_km_inicial"]) &&  $this->nmgp_cmp_readonly["vehiculo_km_inicial"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_km_inicial']);
       $sStyleReadLab_vehiculo_km_inicial = '';
       $sStyleReadInp_vehiculo_km_inicial = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_km_inicial']) && $this->nmgp_cmp_hidden['vehiculo_km_inicial'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_km_inicial" value="<?php echo $this->form_encode_input($vehiculo_km_inicial) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_km_inicial_label" id="hidden_field_label_vehiculo_km_inicial" style="<?php echo $sStyleHidden_vehiculo_km_inicial; ?>"><span id="id_label_vehiculo_km_inicial"><?php echo $this->nm_new_label['vehiculo_km_inicial']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_km_inicial_line" id="hidden_field_data_vehiculo_km_inicial" style="<?php echo $sStyleHidden_vehiculo_km_inicial; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_km_inicial_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_km_inicial"]) &&  $this->nmgp_cmp_readonly["vehiculo_km_inicial"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_km_inicial" value="<?php echo $this->form_encode_input($vehiculo_km_inicial) . "\"><span id=\"id_ajax_label_vehiculo_km_inicial\">" . $vehiculo_km_inicial . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_km_inicial" class="sc-ui-readonly-vehiculo_km_inicial css_vehiculo_km_inicial_line" style="<?php echo $sStyleReadLab_vehiculo_km_inicial; ?>"><?php echo $this->form_encode_input($this->vehiculo_km_inicial); ?></span><span id="id_read_off_vehiculo_km_inicial" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_km_inicial; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_km_inicial_obj" style="" id="id_sc_field_vehiculo_km_inicial" type=text name="vehiculo_km_inicial" value="<?php echo $this->form_encode_input($vehiculo_km_inicial) ?>"
 size=12 alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['vehiculo_km_inicial']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['vehiculo_km_inicial']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['vehiculo_km_inicial']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_km_inicial_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_km_inicial_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_tipo_combustible']))
           {
               $this->nmgp_cmp_readonly['vehiculo_tipo_combustible'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_modelo']))
           {
               $this->nmgp_cmp_readonly['vehiculo_modelo'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['vehiculo_marca']))
    {
        $this->nm_new_label['vehiculo_marca'] = "Marca";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_marca = $this->vehiculo_marca;
   $sStyleHidden_vehiculo_marca = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_marca']) && $this->nmgp_cmp_hidden['vehiculo_marca'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_marca']);
       $sStyleHidden_vehiculo_marca = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_marca = 'display: none;';
   $sStyleReadInp_vehiculo_marca = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_marca"]) &&  $this->nmgp_cmp_readonly["vehiculo_marca"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_marca']);
       $sStyleReadLab_vehiculo_marca = '';
       $sStyleReadInp_vehiculo_marca = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_marca']) && $this->nmgp_cmp_hidden['vehiculo_marca'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_marca" value="<?php echo $this->form_encode_input($vehiculo_marca) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_marca_label" id="hidden_field_label_vehiculo_marca" style="<?php echo $sStyleHidden_vehiculo_marca; ?>"><span id="id_label_vehiculo_marca"><?php echo $this->nm_new_label['vehiculo_marca']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_marca_line" id="hidden_field_data_vehiculo_marca" style="<?php echo $sStyleHidden_vehiculo_marca; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_marca_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_marca"]) &&  $this->nmgp_cmp_readonly["vehiculo_marca"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_marca" value="<?php echo $this->form_encode_input($vehiculo_marca) . "\"><span id=\"id_ajax_label_vehiculo_marca\">" . $vehiculo_marca . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_marca" class="sc-ui-readonly-vehiculo_marca css_vehiculo_marca_line" style="<?php echo $sStyleReadLab_vehiculo_marca; ?>"><?php echo $this->form_encode_input($this->vehiculo_marca); ?></span><span id="id_read_off_vehiculo_marca" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_marca; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_marca_obj" style="" id="id_sc_field_vehiculo_marca" type=text name="vehiculo_marca" value="<?php echo $this->form_encode_input($vehiculo_marca) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_marca_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_marca_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['vehiculo_tipo_combustible']))
    {
        $this->nm_new_label['vehiculo_tipo_combustible'] = "Tipo de Combustible";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_tipo_combustible = $this->vehiculo_tipo_combustible;
   $sStyleHidden_vehiculo_tipo_combustible = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_tipo_combustible']) && $this->nmgp_cmp_hidden['vehiculo_tipo_combustible'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_tipo_combustible']);
       $sStyleHidden_vehiculo_tipo_combustible = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_tipo_combustible = 'display: none;';
   $sStyleReadInp_vehiculo_tipo_combustible = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_tipo_combustible"]) &&  $this->nmgp_cmp_readonly["vehiculo_tipo_combustible"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_tipo_combustible']);
       $sStyleReadLab_vehiculo_tipo_combustible = '';
       $sStyleReadInp_vehiculo_tipo_combustible = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_tipo_combustible']) && $this->nmgp_cmp_hidden['vehiculo_tipo_combustible'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_tipo_combustible" value="<?php echo $this->form_encode_input($vehiculo_tipo_combustible) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_tipo_combustible_label" id="hidden_field_label_vehiculo_tipo_combustible" style="<?php echo $sStyleHidden_vehiculo_tipo_combustible; ?>"><span id="id_label_vehiculo_tipo_combustible"><?php echo $this->nm_new_label['vehiculo_tipo_combustible']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_tipo_combustible_line" id="hidden_field_data_vehiculo_tipo_combustible" style="<?php echo $sStyleHidden_vehiculo_tipo_combustible; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_tipo_combustible_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_tipo_combustible"]) &&  $this->nmgp_cmp_readonly["vehiculo_tipo_combustible"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_tipo_combustible" value="<?php echo $this->form_encode_input($vehiculo_tipo_combustible) . "\"><span id=\"id_ajax_label_vehiculo_tipo_combustible\">" . $vehiculo_tipo_combustible . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_tipo_combustible" class="sc-ui-readonly-vehiculo_tipo_combustible css_vehiculo_tipo_combustible_line" style="<?php echo $sStyleReadLab_vehiculo_tipo_combustible; ?>"><?php echo $this->form_encode_input($this->vehiculo_tipo_combustible); ?></span><span id="id_read_off_vehiculo_tipo_combustible" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_tipo_combustible; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_tipo_combustible_obj" style="" id="id_sc_field_vehiculo_tipo_combustible" type=text name="vehiculo_tipo_combustible" value="<?php echo $this->form_encode_input($vehiculo_tipo_combustible) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_tipo_combustible_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_tipo_combustible_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_estado']))
           {
               $this->nmgp_cmp_readonly['vehiculo_estado'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_color']))
           {
               $this->nmgp_cmp_readonly['vehiculo_color'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['vehiculo_modelo']))
    {
        $this->nm_new_label['vehiculo_modelo'] = "Modelo";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_modelo = $this->vehiculo_modelo;
   $sStyleHidden_vehiculo_modelo = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_modelo']) && $this->nmgp_cmp_hidden['vehiculo_modelo'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_modelo']);
       $sStyleHidden_vehiculo_modelo = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_modelo = 'display: none;';
   $sStyleReadInp_vehiculo_modelo = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_modelo"]) &&  $this->nmgp_cmp_readonly["vehiculo_modelo"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_modelo']);
       $sStyleReadLab_vehiculo_modelo = '';
       $sStyleReadInp_vehiculo_modelo = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_modelo']) && $this->nmgp_cmp_hidden['vehiculo_modelo'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_modelo" value="<?php echo $this->form_encode_input($vehiculo_modelo) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_modelo_label" id="hidden_field_label_vehiculo_modelo" style="<?php echo $sStyleHidden_vehiculo_modelo; ?>"><span id="id_label_vehiculo_modelo"><?php echo $this->nm_new_label['vehiculo_modelo']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_modelo_line" id="hidden_field_data_vehiculo_modelo" style="<?php echo $sStyleHidden_vehiculo_modelo; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_modelo_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_modelo"]) &&  $this->nmgp_cmp_readonly["vehiculo_modelo"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_modelo" value="<?php echo $this->form_encode_input($vehiculo_modelo) . "\"><span id=\"id_ajax_label_vehiculo_modelo\">" . $vehiculo_modelo . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_modelo" class="sc-ui-readonly-vehiculo_modelo css_vehiculo_modelo_line" style="<?php echo $sStyleReadLab_vehiculo_modelo; ?>"><?php echo $this->form_encode_input($this->vehiculo_modelo); ?></span><span id="id_read_off_vehiculo_modelo" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_modelo; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_modelo_obj" style="" id="id_sc_field_vehiculo_modelo" type=text name="vehiculo_modelo" value="<?php echo $this->form_encode_input($vehiculo_modelo) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_modelo_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_modelo_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['vehiculo_estado']))
    {
        $this->nm_new_label['vehiculo_estado'] = "Estado";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_estado = $this->vehiculo_estado;
   $sStyleHidden_vehiculo_estado = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_estado']) && $this->nmgp_cmp_hidden['vehiculo_estado'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_estado']);
       $sStyleHidden_vehiculo_estado = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_estado = 'display: none;';
   $sStyleReadInp_vehiculo_estado = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_estado"]) &&  $this->nmgp_cmp_readonly["vehiculo_estado"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_estado']);
       $sStyleReadLab_vehiculo_estado = '';
       $sStyleReadInp_vehiculo_estado = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_estado']) && $this->nmgp_cmp_hidden['vehiculo_estado'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_estado" value="<?php echo $this->form_encode_input($vehiculo_estado) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_estado_label" id="hidden_field_label_vehiculo_estado" style="<?php echo $sStyleHidden_vehiculo_estado; ?>"><span id="id_label_vehiculo_estado"><?php echo $this->nm_new_label['vehiculo_estado']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_estado_line" id="hidden_field_data_vehiculo_estado" style="<?php echo $sStyleHidden_vehiculo_estado; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_estado_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_estado"]) &&  $this->nmgp_cmp_readonly["vehiculo_estado"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_estado" value="<?php echo $this->form_encode_input($vehiculo_estado) . "\"><span id=\"id_ajax_label_vehiculo_estado\">" . $vehiculo_estado . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_estado" class="sc-ui-readonly-vehiculo_estado css_vehiculo_estado_line" style="<?php echo $sStyleReadLab_vehiculo_estado; ?>"><?php echo $this->form_encode_input($this->vehiculo_estado); ?></span><span id="id_read_off_vehiculo_estado" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_estado; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_estado_obj" style="" id="id_sc_field_vehiculo_estado" type=text name="vehiculo_estado" value="<?php echo $this->form_encode_input($vehiculo_estado) ?>"
 size=45 maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_estado_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_estado_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_fechaasignacion']))
           {
               $this->nmgp_cmp_readonly['vehiculo_fechaasignacion'] = 'on';
           }
?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['vehiculo_chasis']))
           {
               $this->nmgp_cmp_readonly['vehiculo_chasis'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['vehiculo_color']))
    {
        $this->nm_new_label['vehiculo_color'] = "Color";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_color = $this->vehiculo_color;
   $sStyleHidden_vehiculo_color = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_color']) && $this->nmgp_cmp_hidden['vehiculo_color'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_color']);
       $sStyleHidden_vehiculo_color = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_color = 'display: none;';
   $sStyleReadInp_vehiculo_color = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_color"]) &&  $this->nmgp_cmp_readonly["vehiculo_color"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_color']);
       $sStyleReadLab_vehiculo_color = '';
       $sStyleReadInp_vehiculo_color = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_color']) && $this->nmgp_cmp_hidden['vehiculo_color'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_color" value="<?php echo $this->form_encode_input($vehiculo_color) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_color_label" id="hidden_field_label_vehiculo_color" style="<?php echo $sStyleHidden_vehiculo_color; ?>"><span id="id_label_vehiculo_color"><?php echo $this->nm_new_label['vehiculo_color']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_color_line" id="hidden_field_data_vehiculo_color" style="<?php echo $sStyleHidden_vehiculo_color; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_color_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_color"]) &&  $this->nmgp_cmp_readonly["vehiculo_color"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_color" value="<?php echo $this->form_encode_input($vehiculo_color) . "\"><span id=\"id_ajax_label_vehiculo_color\">" . $vehiculo_color . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_color" class="sc-ui-readonly-vehiculo_color css_vehiculo_color_line" style="<?php echo $sStyleReadLab_vehiculo_color; ?>"><?php echo $this->form_encode_input($this->vehiculo_color); ?></span><span id="id_read_off_vehiculo_color" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_color; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_color_obj" style="" id="id_sc_field_vehiculo_color" type=text name="vehiculo_color" value="<?php echo $this->form_encode_input($vehiculo_color) ?>"
 size=50 maxlength=120 alt="{datatype: 'text', maxLength: 120, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_color_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_color_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['vehiculo_fechaasignacion']))
    {
        $this->nm_new_label['vehiculo_fechaasignacion'] = "Fecha de Asignación";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_fechaasignacion = $this->vehiculo_fechaasignacion;
   $sStyleHidden_vehiculo_fechaasignacion = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_fechaasignacion']) && $this->nmgp_cmp_hidden['vehiculo_fechaasignacion'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_fechaasignacion']);
       $sStyleHidden_vehiculo_fechaasignacion = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_fechaasignacion = 'display: none;';
   $sStyleReadInp_vehiculo_fechaasignacion = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_fechaasignacion"]) &&  $this->nmgp_cmp_readonly["vehiculo_fechaasignacion"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_fechaasignacion']);
       $sStyleReadLab_vehiculo_fechaasignacion = '';
       $sStyleReadInp_vehiculo_fechaasignacion = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_fechaasignacion']) && $this->nmgp_cmp_hidden['vehiculo_fechaasignacion'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_fechaasignacion" value="<?php echo $this->form_encode_input($vehiculo_fechaasignacion) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_fechaasignacion_label" id="hidden_field_label_vehiculo_fechaasignacion" style="<?php echo $sStyleHidden_vehiculo_fechaasignacion; ?>"><span id="id_label_vehiculo_fechaasignacion"><?php echo $this->nm_new_label['vehiculo_fechaasignacion']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_fechaasignacion_line" id="hidden_field_data_vehiculo_fechaasignacion" style="<?php echo $sStyleHidden_vehiculo_fechaasignacion; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_fechaasignacion_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_fechaasignacion"]) &&  $this->nmgp_cmp_readonly["vehiculo_fechaasignacion"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_fechaasignacion" value="<?php echo $this->form_encode_input($vehiculo_fechaasignacion) . "\"><span id=\"id_ajax_label_vehiculo_fechaasignacion\">" . $vehiculo_fechaasignacion . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_fechaasignacion" class="sc-ui-readonly-vehiculo_fechaasignacion css_vehiculo_fechaasignacion_line" style="<?php echo $sStyleReadLab_vehiculo_fechaasignacion; ?>"><?php echo $this->form_encode_input($vehiculo_fechaasignacion); ?></span><span id="id_read_off_vehiculo_fechaasignacion" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_fechaasignacion; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_fechaasignacion_obj" style="" id="id_sc_field_vehiculo_fechaasignacion" type=text name="vehiculo_fechaasignacion" value="<?php echo $this->form_encode_input($vehiculo_fechaasignacion) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['vehiculo_fechaasignacion']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['vehiculo_fechaasignacion']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ><?php
$tmp_form_data = $this->field_config['vehiculo_fechaasignacion']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_fechaasignacion_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_fechaasignacion_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['vehiculo_chasis']))
    {
        $this->nm_new_label['vehiculo_chasis'] = "Chasis";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $vehiculo_chasis = $this->vehiculo_chasis;
   $sStyleHidden_vehiculo_chasis = '';
   if (isset($this->nmgp_cmp_hidden['vehiculo_chasis']) && $this->nmgp_cmp_hidden['vehiculo_chasis'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['vehiculo_chasis']);
       $sStyleHidden_vehiculo_chasis = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_vehiculo_chasis = 'display: none;';
   $sStyleReadInp_vehiculo_chasis = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["vehiculo_chasis"]) &&  $this->nmgp_cmp_readonly["vehiculo_chasis"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['vehiculo_chasis']);
       $sStyleReadLab_vehiculo_chasis = '';
       $sStyleReadInp_vehiculo_chasis = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['vehiculo_chasis']) && $this->nmgp_cmp_hidden['vehiculo_chasis'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="vehiculo_chasis" value="<?php echo $this->form_encode_input($vehiculo_chasis) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_vehiculo_chasis_label" id="hidden_field_label_vehiculo_chasis" style="<?php echo $sStyleHidden_vehiculo_chasis; ?>"><span id="id_label_vehiculo_chasis"><?php echo $this->nm_new_label['vehiculo_chasis']; ?></span></TD>
    <TD class="scFormDataOdd css_vehiculo_chasis_line" id="hidden_field_data_vehiculo_chasis" style="<?php echo $sStyleHidden_vehiculo_chasis; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_vehiculo_chasis_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["vehiculo_chasis"]) &&  $this->nmgp_cmp_readonly["vehiculo_chasis"] == "on")) { 

 ?>
<input type="hidden" name="vehiculo_chasis" value="<?php echo $this->form_encode_input($vehiculo_chasis) . "\"><span id=\"id_ajax_label_vehiculo_chasis\">" . $vehiculo_chasis . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_vehiculo_chasis" class="sc-ui-readonly-vehiculo_chasis css_vehiculo_chasis_line" style="<?php echo $sStyleReadLab_vehiculo_chasis; ?>"><?php echo $this->form_encode_input($this->vehiculo_chasis); ?></span><span id="id_read_off_vehiculo_chasis" style="white-space: nowrap;<?php echo $sStyleReadInp_vehiculo_chasis; ?>">
 <input class="sc-js-input scFormObjectOdd css_vehiculo_chasis_obj" style="" id="id_sc_field_vehiculo_chasis" type=text name="vehiculo_chasis" value="<?php echo $this->form_encode_input($vehiculo_chasis) ?>"
 size=50 maxlength=60 alt="{datatype: 'text', maxLength: 60, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_vehiculo_chasis_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_vehiculo_chasis_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">DETALLE DE MANTENIMIENTOS</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detallle_mantenimientos']))
    {
        $this->nm_new_label['detallle_mantenimientos'] = "detallle_mantenimientos";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detallle_mantenimientos = $this->detallle_mantenimientos;
   $sStyleHidden_detallle_mantenimientos = '';
   if (isset($this->nmgp_cmp_hidden['detallle_mantenimientos']) && $this->nmgp_cmp_hidden['detallle_mantenimientos'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detallle_mantenimientos']);
       $sStyleHidden_detallle_mantenimientos = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detallle_mantenimientos = 'display: none;';
   $sStyleReadInp_detallle_mantenimientos = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detallle_mantenimientos']) && $this->nmgp_cmp_readonly['detallle_mantenimientos'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detallle_mantenimientos']);
       $sStyleReadLab_detallle_mantenimientos = '';
       $sStyleReadInp_detallle_mantenimientos = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detallle_mantenimientos']) && $this->nmgp_cmp_hidden['detallle_mantenimientos'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detallle_mantenimientos" value="<?php echo $this->form_encode_input($detallle_mantenimientos) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detallle_mantenimientos_line" id="hidden_field_data_detallle_mantenimientos" style="<?php echo $sStyleHidden_detallle_mantenimientos; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detallle_mantenimientos_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detallle_mantenimientos'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detallle_mantenimientos'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_detallle_mantenimientos'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_liga_form_insert'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_liga_tp_pag'] = 'total';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_parms'] = "SC_glo_par_idvehiculo_reporte*scinIdVehiculo_reporte*scoutSC_glo_par_mantenimiento_fecha_inicio*scinmantenimiento_fecha_inicio*scoutSC_glo_par_mantenimiento_fecha_fin*scinmantenimiento_fecha_fin*scoutNM_btn_insert*scinN*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['foreign_key']['idvehiculo'] = $this->nmgp_dados_form['idvehiculo'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['where_filter'] = "IdVehiculo = " . $this->nmgp_dados_form['idvehiculo'] . "";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['where_detal']  = "IdVehiculo = " . $this->nmgp_dados_form['idvehiculo'] . "";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_datos_vehiculo_reporte']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_datos_vehiculo_reporte_empty.htm' : $this->Ini->link_form_mantenimiento_impresion_edit . '?SC_where_pdf=' . $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['where_filter'] . '&script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_session=' . session_id() . '&script_case_detail=Y';
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['pdf_view'])
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_pdf'] = true;
     $_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['form_mantenimiento_impresion'] = $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_form_parms'] . '?#?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '?@??#?script_case_session=' . session_id() . '?@??#?script_case_detail=Y?@?';
     include_once ($this->Ini->root . $this->Ini->link_form_mantenimiento_impresion_edit . "index.php");
     $this->form_mantenimiento_impresion_pdf_det = new form_mantenimiento_impresion_edit;
     if (method_exists($this->form_mantenimiento_impresion_pdf_det, "inicializa"))
     {
         $this->form_mantenimiento_impresion_pdf_det->inicializa();
     }
     unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['form_mantenimiento_impresion_script_case_init'] ]['form_mantenimiento_impresion']['embutida_pdf']);
     unset($_SESSION['sc_session']['scriptcase']['embutida_form_pdf']['form_mantenimiento_impresion']);
 }
 else
 {
?>
    <iframe border="0" id="nmsc_iframe_liga_form_mantenimiento_impresion"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="100" width="100%" name="nmsc_iframe_liga_form_mantenimiento_impresion"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
 }
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detallle_mantenimientos_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detallle_mantenimientos_text"></span></td></tr></table></td></tr></table> </TD>
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
if (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['pdf_view'])
{
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio_off", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna_off", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca_off", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal_off", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_off_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1);

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
  $nm_sc_blocos_da_pag = array(0,1);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['masterValue']);
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
<?php
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['pdf_view']) {
?>
 $(document).ready(function() {
});
<?php
}
?>
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_datos_vehiculo_reporte");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_datos_vehiculo_reporte");
 parent.scAjaxDetailHeight("form_datos_vehiculo_reporte", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_datos_vehiculo_reporte", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_datos_vehiculo_reporte", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_datos_vehiculo_reporte']['sc_modal'])
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
			tb_show('', "<?php echo  $this->Ini->path_link . SC_dir_app_name('form_datos_vehiculo_reporte')  ?>/form_datos_vehiculo_reporte_config_pdf.php?nm_opc=pdf&nm_target=2&nm_cor=cor&papel=8&lpapel=0&apapel=0&orientacao=1&bookmarks=XX&largura=800&conf_larg=10&conf_fonte=N&grafico=XX&language=es&conf_socor=N&KeepThis=true&TB_iframe=true&modal=true");
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
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
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
		if ($("#sc_b_ini_b.sc-unique-btn-5").length && $("#sc_b_ini_b.sc-unique-btn-5").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_off_b.sc-unique-btn-6").length && $("#sc_b_ini_off_b.sc-unique-btn-6").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-7").length && $("#sc_b_ret_b.sc-unique-btn-7").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_off_b.sc-unique-btn-8").length && $("#sc_b_ret_off_b.sc-unique-btn-8").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-9").length && $("#sc_b_avc_b.sc-unique-btn-9").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_off_b.sc-unique-btn-10").length && $("#sc_b_avc_off_b.sc-unique-btn-10").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-11").length && $("#sc_b_fim_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_off_b.sc-unique-btn-12").length && $("#sc_b_fim_off_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('final');
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
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
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
