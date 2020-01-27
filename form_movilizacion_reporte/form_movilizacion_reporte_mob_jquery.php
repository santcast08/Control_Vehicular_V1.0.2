
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
  scEventControl_data["usuario_idusuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_placa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_matricula" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_marca" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_modelo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_color" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_chasis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_numero_motor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_km_galon" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_km_inicial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_tipo_combustible" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculo_fechaasignacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_movilizacion_reporte" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["usuario_idusuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_idusuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_placa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_placa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_matricula" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_matricula" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_marca" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_marca" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_modelo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_modelo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_color" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_color" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_chasis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_chasis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_numero_motor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_numero_motor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_km_galon" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_km_galon" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_km_inicial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_km_inicial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_tipo_combustible" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_tipo_combustible" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_estado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_fechaasignacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculo_fechaasignacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_reporte" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion_reporte" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("usuario_idusuario" + iSeq == fieldName) {
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
  $('#id_sc_field_vehiculo_placa' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_placa_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_placa_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_matricula' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_matricula_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_matricula_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_marca' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_marca_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_marca_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_modelo' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_modelo_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_modelo_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_color' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_color_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_color_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_chasis' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_chasis_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_chasis_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_numero_motor' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_numero_motor_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_numero_motor_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_km_galon' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_km_galon_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_km_galon_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_km_inicial' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_km_inicial_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_km_inicial_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_tipo_combustible' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_tipo_combustible_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_tipo_combustible_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_estado' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_estado_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_vehiculo_fechaasignacion' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_vehiculo_fechaasignacion_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_movilizacion_reporte_vehiculo_fechaasignacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_idusuario' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_usuario_idusuario_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_movilizacion_reporte_usuario_idusuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_movilizacion_reporte' + iSeqRow).bind('blur', function() { sc_form_movilizacion_reporte_detalle_movilizacion_reporte_onblur(this, iSeqRow) })
                                                          .bind('focus', function() { sc_form_movilizacion_reporte_detalle_movilizacion_reporte_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_movilizacion_reporte_vehiculo_placa_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_placa();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_placa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_matricula_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_matricula();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_matricula_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_marca_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_marca();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_marca_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_modelo_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_modelo();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_modelo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_color_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_color();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_color_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_chasis_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_chasis();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_chasis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_numero_motor_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_numero_motor();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_numero_motor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_km_galon_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_km_galon();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_km_galon_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_km_inicial_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_km_inicial();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_km_inicial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_tipo_combustible_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_tipo_combustible();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_tipo_combustible_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_estado();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_fechaasignacion_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_fechaasignacion();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_vehiculo_fechaasignacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_usuario_idusuario_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_usuario_idusuario();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_usuario_idusuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_reporte_detalle_movilizacion_reporte_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_reporte_mob_validate_detalle_movilizacion_reporte();
  scCssBlur(oThis);
}

function sc_form_movilizacion_reporte_detalle_movilizacion_reporte_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("usuario_idusuario", "", status);
	displayChange_field("Vehiculo_Placa", "", status);
	displayChange_field("Vehiculo_Matricula", "", status);
	displayChange_field("Vehiculo_Marca", "", status);
	displayChange_field("Vehiculo_Modelo", "", status);
	displayChange_field("Vehiculo_Color", "", status);
	displayChange_field("Vehiculo_Chasis", "", status);
	displayChange_field("Vehiculo_Numero_Motor", "", status);
	displayChange_field("Vehiculo_Km_Galon", "", status);
	displayChange_field("Vehiculo_Km_Inicial", "", status);
	displayChange_field("Vehiculo_Tipo_Combustible", "", status);
	displayChange_field("Vehiculo_Estado", "", status);
	displayChange_field("vehiculo_fechaasignacion", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("detalle_movilizacion_reporte", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_usuario_idusuario(row, status);
	displayChange_field_vehiculo_placa(row, status);
	displayChange_field_vehiculo_matricula(row, status);
	displayChange_field_vehiculo_marca(row, status);
	displayChange_field_vehiculo_modelo(row, status);
	displayChange_field_vehiculo_color(row, status);
	displayChange_field_vehiculo_chasis(row, status);
	displayChange_field_vehiculo_numero_motor(row, status);
	displayChange_field_vehiculo_km_galon(row, status);
	displayChange_field_vehiculo_km_inicial(row, status);
	displayChange_field_vehiculo_tipo_combustible(row, status);
	displayChange_field_vehiculo_estado(row, status);
	displayChange_field_vehiculo_fechaasignacion(row, status);
	displayChange_field_detalle_movilizacion_reporte(row, status);
}

function displayChange_field(field, row, status) {
	if ("usuario_idusuario" == field) {
		displayChange_field_usuario_idusuario(row, status);
	}
	if ("vehiculo_placa" == field) {
		displayChange_field_vehiculo_placa(row, status);
	}
	if ("vehiculo_matricula" == field) {
		displayChange_field_vehiculo_matricula(row, status);
	}
	if ("vehiculo_marca" == field) {
		displayChange_field_vehiculo_marca(row, status);
	}
	if ("vehiculo_modelo" == field) {
		displayChange_field_vehiculo_modelo(row, status);
	}
	if ("vehiculo_color" == field) {
		displayChange_field_vehiculo_color(row, status);
	}
	if ("vehiculo_chasis" == field) {
		displayChange_field_vehiculo_chasis(row, status);
	}
	if ("vehiculo_numero_motor" == field) {
		displayChange_field_vehiculo_numero_motor(row, status);
	}
	if ("vehiculo_km_galon" == field) {
		displayChange_field_vehiculo_km_galon(row, status);
	}
	if ("vehiculo_km_inicial" == field) {
		displayChange_field_vehiculo_km_inicial(row, status);
	}
	if ("vehiculo_tipo_combustible" == field) {
		displayChange_field_vehiculo_tipo_combustible(row, status);
	}
	if ("vehiculo_estado" == field) {
		displayChange_field_vehiculo_estado(row, status);
	}
	if ("vehiculo_fechaasignacion" == field) {
		displayChange_field_vehiculo_fechaasignacion(row, status);
	}
	if ("detalle_movilizacion_reporte" == field) {
		displayChange_field_detalle_movilizacion_reporte(row, status);
	}
}

function displayChange_field_usuario_idusuario(row, status) {
	if ("on" == status) {
		$("#id_sc_field_usuario_idusuario" + row).select2("destroy");
		scJQSelect2Add(row, "usuario_idusuario");
	}
}

function displayChange_field_vehiculo_placa(row, status) {
}

function displayChange_field_vehiculo_matricula(row, status) {
}

function displayChange_field_vehiculo_marca(row, status) {
}

function displayChange_field_vehiculo_modelo(row, status) {
}

function displayChange_field_vehiculo_color(row, status) {
}

function displayChange_field_vehiculo_chasis(row, status) {
}

function displayChange_field_vehiculo_numero_motor(row, status) {
}

function displayChange_field_vehiculo_km_galon(row, status) {
}

function displayChange_field_vehiculo_km_inicial(row, status) {
}

function displayChange_field_vehiculo_tipo_combustible(row, status) {
}

function displayChange_field_vehiculo_estado(row, status) {
}

function displayChange_field_vehiculo_fechaasignacion(row, status) {
}

function displayChange_field_detalle_movilizacion_reporte(row, status) {
}

function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_movilizacion_reporte_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(37);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_vehiculo_fechaasignacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_vehiculo_fechaasignacion" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movilizacion_reporte_mob_validate_vehiculo_fechaasignacion(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['vehiculo_fechaasignacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  if (null == specificField || "usuario_idusuario" == specificField) {
    scJQSelect2Add_usuario_idusuario(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_usuario_idusuario(seqRow) {
  $("#id_sc_field_usuario_idusuario" + seqRow).select2(
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
