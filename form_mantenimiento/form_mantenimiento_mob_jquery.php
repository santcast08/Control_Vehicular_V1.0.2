
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["idusuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idvehiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mantenimiento_fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mantenimiento_kilometraje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mantenimiento_tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtipo_mantenimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mantenimiento_observacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mantenimiento_estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idusuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idusuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idvehiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idvehiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_kilometraje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_kilometraje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtipo_mantenimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtipo_mantenimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_observacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_observacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_estado" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idusuario" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("mantenimiento_tipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idtipo_mantenimiento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("mantenimiento_estado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_mantenimiento_fecha' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_mantenimiento_fecha_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_mantenimiento_mantenimiento_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_mantenimiento_tipo' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_mantenimiento_tipo_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_mantenimiento_mantenimiento_tipo_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_mantenimiento_mantenimiento_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_mantenimiento_kilometraje' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_mantenimiento_kilometraje_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_mantenimiento_mantenimiento_kilometraje_onfocus(this, iSeqRow) });
  $('#id_sc_field_mantenimiento_observacion' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_mantenimiento_observacion_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_mantenimiento_mantenimiento_observacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_mantenimiento_estado' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_mantenimiento_estado_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_mantenimiento_mantenimiento_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_idvehiculo' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_idvehiculo_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_mantenimiento_idvehiculo_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_mantenimiento_idvehiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_idusuario' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_idusuario_onblur(this, iSeqRow) })
                                       .bind('click', function() { sc_form_mantenimiento_idusuario_onclick(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_mantenimiento_idusuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_idtipo_mantenimiento' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_idtipo_mantenimiento_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_mantenimiento_idtipo_mantenimiento_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_mantenimiento_mantenimiento_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_validate_mantenimiento_fecha();
  scCssBlur(oThis);
}

function sc_form_mantenimiento_mantenimiento_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_mantenimiento_mantenimiento_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_validate_mantenimiento_tipo();
  scCssBlur(oThis);
}

function sc_form_mantenimiento_mantenimiento_tipo_onchange(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_refresh_mantenimiento_tipo();
}

function sc_form_mantenimiento_mantenimiento_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_mantenimiento_mantenimiento_kilometraje_onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_validate_mantenimiento_kilometraje();
  scCssBlur(oThis);
}

function sc_form_mantenimiento_mantenimiento_kilometraje_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_mantenimiento_mantenimiento_observacion_onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_validate_mantenimiento_observacion();
  scCssBlur(oThis);
}

function sc_form_mantenimiento_mantenimiento_observacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_mantenimiento_mantenimiento_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_validate_mantenimiento_estado();
  scCssBlur(oThis);
}

function sc_form_mantenimiento_mantenimiento_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_mantenimiento_idvehiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_validate_idvehiculo();
  scCssBlur(oThis);
}

function sc_form_mantenimiento_idvehiculo_onchange(oThis, iSeqRow) {
  lookup_idvehiculo();
}

function sc_form_mantenimiento_idvehiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_mantenimiento_idusuario_onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_validate_idusuario();
  scCssBlur(oThis);
}

function sc_form_mantenimiento_idusuario_onclick(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_event_idusuario_onclick();
}

function sc_form_mantenimiento_idusuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_mantenimiento_idtipo_mantenimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_mob_validate_idtipo_mantenimiento();
  scCssBlur(oThis);
}

function sc_form_mantenimiento_idtipo_mantenimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idusuario", "", status);
	displayChange_field("IdVehiculo", "", status);
	displayChange_field("mantenimiento_fecha", "", status);
	displayChange_field("mantenimiento_kilometraje", "", status);
	displayChange_field("mantenimiento_tipo", "", status);
	displayChange_field("idTipo_Mantenimiento", "", status);
	displayChange_field("mantenimiento_observacion", "", status);
	displayChange_field("mantenimiento_estado", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idusuario(row, status);
	displayChange_field_idvehiculo(row, status);
	displayChange_field_mantenimiento_fecha(row, status);
	displayChange_field_mantenimiento_kilometraje(row, status);
	displayChange_field_mantenimiento_tipo(row, status);
	displayChange_field_idtipo_mantenimiento(row, status);
	displayChange_field_mantenimiento_observacion(row, status);
	displayChange_field_mantenimiento_estado(row, status);
}

function displayChange_field(field, row, status) {
	if ("idusuario" == field) {
		displayChange_field_idusuario(row, status);
	}
	if ("idvehiculo" == field) {
		displayChange_field_idvehiculo(row, status);
	}
	if ("mantenimiento_fecha" == field) {
		displayChange_field_mantenimiento_fecha(row, status);
	}
	if ("mantenimiento_kilometraje" == field) {
		displayChange_field_mantenimiento_kilometraje(row, status);
	}
	if ("mantenimiento_tipo" == field) {
		displayChange_field_mantenimiento_tipo(row, status);
	}
	if ("idtipo_mantenimiento" == field) {
		displayChange_field_idtipo_mantenimiento(row, status);
	}
	if ("mantenimiento_observacion" == field) {
		displayChange_field_mantenimiento_observacion(row, status);
	}
	if ("mantenimiento_estado" == field) {
		displayChange_field_mantenimiento_estado(row, status);
	}
}

function displayChange_field_idusuario(row, status) {
}

function displayChange_field_idvehiculo(row, status) {
}

function displayChange_field_mantenimiento_fecha(row, status) {
}

function displayChange_field_mantenimiento_kilometraje(row, status) {
}

function displayChange_field_mantenimiento_tipo(row, status) {
}

function displayChange_field_idtipo_mantenimiento(row, status) {
}

function displayChange_field_mantenimiento_observacion(row, status) {
}

function displayChange_field_mantenimiento_estado(row, status) {
}

function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_mantenimiento_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(30);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_mantenimiento_fecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_mantenimiento_fecha" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_mantenimiento_mob_validate_mantenimiento_fecha(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['mantenimiento_fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true,
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
