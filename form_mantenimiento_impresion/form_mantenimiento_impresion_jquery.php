
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
  scEventControl_data["mantenimiento_fecha_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idusuario_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idvehiculo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mantenimiento_kilometraje_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mantenimiento_tipo_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtipo_mantenimiento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mantenimiento_observacion_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idmantenimiento_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["mantenimiento_fecha_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_fecha_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idusuario_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idusuario_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idvehiculo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idvehiculo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_kilometraje_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_kilometraje_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_tipo_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_tipo_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtipo_mantenimiento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtipo_mantenimiento_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_observacion_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mantenimiento_observacion_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idmantenimiento_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idmantenimiento_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idusuario_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("mantenimiento_tipo_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idtipo_mantenimiento_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("mantenimiento_estado_" + iSeq == fieldName) {
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
  $('#id_sc_field_idmantenimiento_' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_impresion_idmantenimiento__onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_mantenimiento_impresion_idmantenimiento__onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_mantenimiento_impresion_idmantenimiento__onfocus(this, iSeqRow) });
  $('#id_sc_field_mantenimiento_fecha_' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_impresion_mantenimiento_fecha__onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_form_mantenimiento_impresion_mantenimiento_fecha__onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_mantenimiento_impresion_mantenimiento_fecha__onfocus(this, iSeqRow) });
  $('#id_sc_field_mantenimiento_tipo_' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_impresion_mantenimiento_tipo__onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_mantenimiento_impresion_mantenimiento_tipo__onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_mantenimiento_impresion_mantenimiento_tipo__onfocus(this, iSeqRow) });
  $('#id_sc_field_mantenimiento_kilometraje_' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_impresion_mantenimiento_kilometraje__onblur(this, iSeqRow) })
                                                        .bind('change', function() { sc_form_mantenimiento_impresion_mantenimiento_kilometraje__onchange(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_mantenimiento_impresion_mantenimiento_kilometraje__onfocus(this, iSeqRow) });
  $('#id_sc_field_mantenimiento_observacion_' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_impresion_mantenimiento_observacion__onblur(this, iSeqRow) })
                                                        .bind('change', function() { sc_form_mantenimiento_impresion_mantenimiento_observacion__onchange(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_mantenimiento_impresion_mantenimiento_observacion__onfocus(this, iSeqRow) });
  $('#id_sc_field_idvehiculo_' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_impresion_idvehiculo__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_mantenimiento_impresion_idvehiculo__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_mantenimiento_impresion_idvehiculo__onfocus(this, iSeqRow) });
  $('#id_sc_field_idusuario_' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_impresion_idusuario__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_mantenimiento_impresion_idusuario__onchange(this, iSeqRow) })
                                        .bind('click', function() { sc_form_mantenimiento_impresion_idusuario__onclick(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_mantenimiento_impresion_idusuario__onfocus(this, iSeqRow) });
  $('#id_sc_field_idtipo_mantenimiento_' + iSeqRow).bind('blur', function() { sc_form_mantenimiento_impresion_idtipo_mantenimiento__onblur(this, iSeqRow) })
                                                   .bind('change', function() { sc_form_mantenimiento_impresion_idtipo_mantenimiento__onchange(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_mantenimiento_impresion_idtipo_mantenimiento__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_mantenimiento_impresion_idmantenimiento__onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_validate_idmantenimiento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_idmantenimiento__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_mantenimiento_impresion_idmantenimiento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_fecha__onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_validate_mantenimiento_fecha_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_fecha__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_fecha__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_tipo__onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_validate_mantenimiento_tipo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_tipo__onchange(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_refresh_mantenimiento_tipo_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_tipo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_kilometraje__onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_validate_mantenimiento_kilometraje_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_kilometraje__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_kilometraje__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_observacion__onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_validate_mantenimiento_observacion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_observacion__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_mantenimiento_impresion_mantenimiento_observacion__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_idvehiculo__onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_validate_idvehiculo_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_idvehiculo__onchange(oThis, iSeqRow) {
  lookup_idvehiculo_(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_mantenimiento_impresion_idvehiculo__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_idusuario__onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_validate_idusuario_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_idusuario__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_mantenimiento_impresion_idusuario__onclick(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_event_idusuario__onclick(iSeqRow);
}

function sc_form_mantenimiento_impresion_idusuario__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_idtipo_mantenimiento__onblur(oThis, iSeqRow) {
  do_ajax_form_mantenimiento_impresion_validate_idtipo_mantenimiento_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_mantenimiento_impresion_idtipo_mantenimiento__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_mantenimiento_impresion_idtipo_mantenimiento__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("mantenimiento_fecha_", "", status);
	displayChange_field("idusuario_", "", status);
	displayChange_field("IdVehiculo_", "", status);
	displayChange_field("mantenimiento_kilometraje_", "", status);
	displayChange_field("mantenimiento_tipo_", "", status);
	displayChange_field("idTipo_Mantenimiento_", "", status);
	displayChange_field("mantenimiento_observacion_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_mantenimiento_fecha_(row, status);
	displayChange_field_idusuario_(row, status);
	displayChange_field_idvehiculo_(row, status);
	displayChange_field_mantenimiento_kilometraje_(row, status);
	displayChange_field_mantenimiento_tipo_(row, status);
	displayChange_field_idtipo_mantenimiento_(row, status);
	displayChange_field_mantenimiento_observacion_(row, status);
	displayChange_field_idmantenimiento_(row, status);
}

function displayChange_field(field, row, status) {
	if ("mantenimiento_fecha_" == field) {
		displayChange_field_mantenimiento_fecha_(row, status);
	}
	if ("idusuario_" == field) {
		displayChange_field_idusuario_(row, status);
	}
	if ("idvehiculo_" == field) {
		displayChange_field_idvehiculo_(row, status);
	}
	if ("mantenimiento_kilometraje_" == field) {
		displayChange_field_mantenimiento_kilometraje_(row, status);
	}
	if ("mantenimiento_tipo_" == field) {
		displayChange_field_mantenimiento_tipo_(row, status);
	}
	if ("idtipo_mantenimiento_" == field) {
		displayChange_field_idtipo_mantenimiento_(row, status);
	}
	if ("mantenimiento_observacion_" == field) {
		displayChange_field_mantenimiento_observacion_(row, status);
	}
	if ("idmantenimiento_" == field) {
		displayChange_field_idmantenimiento_(row, status);
	}
}

function displayChange_field_mantenimiento_fecha_(row, status) {
}

function displayChange_field_idusuario_(row, status) {
}

function displayChange_field_idvehiculo_(row, status) {
}

function displayChange_field_mantenimiento_kilometraje_(row, status) {
}

function displayChange_field_mantenimiento_tipo_(row, status) {
}

function displayChange_field_idtipo_mantenimiento_(row, status) {
}

function displayChange_field_mantenimiento_observacion_(row, status) {
}

function displayChange_field_idmantenimiento_(row, status) {
}

function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_mantenimiento_impresion_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(36);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_mantenimiento_fecha_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_mantenimiento_fecha_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_mantenimiento_impresion_validate_mantenimiento_fecha_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['mantenimiento_fecha_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

