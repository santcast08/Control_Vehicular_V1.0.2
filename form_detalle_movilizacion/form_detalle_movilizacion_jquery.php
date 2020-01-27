
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
  scEventControl_data["detalle_movilizacion_origen_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_movilizacion_destino_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_movilizacion_fecha_inicio_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_movilizacion_fecha_fin_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_movilizacion_distancia_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iddetalle_movilizacion_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["detalle_movilizacion_origen_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_origen_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_destino_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_destino_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_fecha_inicio_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_fecha_inicio_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_fecha_fin_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_fecha_fin_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_distancia_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_distancia_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iddetalle_movilizacion_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iddetalle_movilizacion_" + iSeqRow]["change"]) {
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
  if ("detalle_movilizacion_origen_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("detalle_movilizacion_destino_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_movilizacion_" + iSeq == fieldName) {
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
  $('#id_sc_field_iddetalle_movilizacion_' + iSeqRow).bind('blur', function() { sc_form_detalle_movilizacion_iddetalle_movilizacion__onblur(this, iSeqRow) })
                                                     .bind('change', function() { sc_form_detalle_movilizacion_iddetalle_movilizacion__onchange(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_detalle_movilizacion_iddetalle_movilizacion__onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_movilizacion_origen_' + iSeqRow).bind('blur', function() { sc_form_detalle_movilizacion_detalle_movilizacion_origen__onblur(this, iSeqRow) })
                                                          .bind('change', function() { sc_form_detalle_movilizacion_detalle_movilizacion_origen__onchange(this, iSeqRow) })
                                                          .bind('focus', function() { sc_form_detalle_movilizacion_detalle_movilizacion_origen__onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_movilizacion_destino_' + iSeqRow).bind('blur', function() { sc_form_detalle_movilizacion_detalle_movilizacion_destino__onblur(this, iSeqRow) })
                                                           .bind('change', function() { sc_form_detalle_movilizacion_detalle_movilizacion_destino__onchange(this, iSeqRow) })
                                                           .bind('click', function() { sc_form_detalle_movilizacion_detalle_movilizacion_destino__onclick(this, iSeqRow) })
                                                           .bind('focus', function() { sc_form_detalle_movilizacion_detalle_movilizacion_destino__onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_movilizacion_fecha_inicio_' + iSeqRow).bind('blur', function() { sc_form_detalle_movilizacion_detalle_movilizacion_fecha_inicio__onblur(this, iSeqRow) })
                                                                .bind('change', function() { sc_form_detalle_movilizacion_detalle_movilizacion_fecha_inicio__onchange(this, iSeqRow) })
                                                                .bind('focus', function() { sc_form_detalle_movilizacion_detalle_movilizacion_fecha_inicio__onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_movilizacion_fecha_fin_' + iSeqRow).bind('blur', function() { sc_form_detalle_movilizacion_detalle_movilizacion_fecha_fin__onblur(this, iSeqRow) })
                                                             .bind('change', function() { sc_form_detalle_movilizacion_detalle_movilizacion_fecha_fin__onchange(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_detalle_movilizacion_detalle_movilizacion_fecha_fin__onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_movilizacion_distancia_' + iSeqRow).bind('blur', function() { sc_form_detalle_movilizacion_detalle_movilizacion_distancia__onblur(this, iSeqRow) })
                                                             .bind('change', function() { sc_form_detalle_movilizacion_detalle_movilizacion_distancia__onchange(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_detalle_movilizacion_detalle_movilizacion_distancia__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_detalle_movilizacion_iddetalle_movilizacion__onblur(oThis, iSeqRow) {
  do_ajax_form_detalle_movilizacion_validate_iddetalle_movilizacion_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_iddetalle_movilizacion__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detalle_movilizacion_iddetalle_movilizacion__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_origen__onblur(oThis, iSeqRow) {
  do_ajax_form_detalle_movilizacion_validate_detalle_movilizacion_origen_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_origen__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_origen__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_destino__onblur(oThis, iSeqRow) {
  do_ajax_form_detalle_movilizacion_validate_detalle_movilizacion_destino_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_destino__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_destino__onclick(oThis, iSeqRow) {
  do_ajax_form_detalle_movilizacion_event_detalle_movilizacion_destino__onclick(iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_destino__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_fecha_inicio__onblur(oThis, iSeqRow) {
  do_ajax_form_detalle_movilizacion_validate_detalle_movilizacion_fecha_inicio_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_fecha_inicio__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_fecha_inicio__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_fecha_fin__onblur(oThis, iSeqRow) {
  do_ajax_form_detalle_movilizacion_validate_detalle_movilizacion_fecha_fin_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_fecha_fin__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_fecha_fin__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_distancia__onblur(oThis, iSeqRow) {
  do_ajax_form_detalle_movilizacion_validate_detalle_movilizacion_distancia_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_distancia__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detalle_movilizacion_detalle_movilizacion_distancia__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("detalle_movilizacion_origen_", "", status);
	displayChange_field("detalle_movilizacion_destino_", "", status);
	displayChange_field("detalle_movilizacion_fecha_inicio_", "", status);
	displayChange_field("detalle_movilizacion_fecha_fin_", "", status);
	displayChange_field("detalle_movilizacion_distancia_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_detalle_movilizacion_origen_(row, status);
	displayChange_field_detalle_movilizacion_destino_(row, status);
	displayChange_field_detalle_movilizacion_fecha_inicio_(row, status);
	displayChange_field_detalle_movilizacion_fecha_fin_(row, status);
	displayChange_field_detalle_movilizacion_distancia_(row, status);
	displayChange_field_iddetalle_movilizacion_(row, status);
}

function displayChange_field(field, row, status) {
	if ("detalle_movilizacion_origen_" == field) {
		displayChange_field_detalle_movilizacion_origen_(row, status);
	}
	if ("detalle_movilizacion_destino_" == field) {
		displayChange_field_detalle_movilizacion_destino_(row, status);
	}
	if ("detalle_movilizacion_fecha_inicio_" == field) {
		displayChange_field_detalle_movilizacion_fecha_inicio_(row, status);
	}
	if ("detalle_movilizacion_fecha_fin_" == field) {
		displayChange_field_detalle_movilizacion_fecha_fin_(row, status);
	}
	if ("detalle_movilizacion_distancia_" == field) {
		displayChange_field_detalle_movilizacion_distancia_(row, status);
	}
	if ("iddetalle_movilizacion_" == field) {
		displayChange_field_iddetalle_movilizacion_(row, status);
	}
}

function displayChange_field_detalle_movilizacion_origen_(row, status) {
}

function displayChange_field_detalle_movilizacion_destino_(row, status) {
}

function displayChange_field_detalle_movilizacion_fecha_inicio_(row, status) {
}

function displayChange_field_detalle_movilizacion_fecha_fin_(row, status) {
}

function displayChange_field_detalle_movilizacion_distancia_(row, status) {
}

function displayChange_field_iddetalle_movilizacion_(row, status) {
}

function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_detalle_movilizacion_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(33);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_detalle_movilizacion_fecha_inicio_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_detalle_movilizacion_fecha_inicio_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_detalle_movilizacion_validate_detalle_movilizacion_fecha_inicio_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['detalle_movilizacion_fecha_inicio_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true,
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });

  $("#id_sc_field_detalle_movilizacion_fecha_fin_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_detalle_movilizacion_fecha_fin_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_detalle_movilizacion_validate_detalle_movilizacion_fecha_fin_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['detalle_movilizacion_fecha_fin_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  if (null == specificField || "id_movilizacion_" == specificField) {
    scJQSelect2Add_id_movilizacion_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_id_movilizacion_(seqRow) {
  $("#id_sc_field_id_movilizacion_" + seqRow).select2(
    {
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
} // scJQElementsAdd

