
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
  scEventControl_data["id_movilizacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idusuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idvehiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_funcionario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_hora_salida" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_total_combustible" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_hora_llegada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_total_galones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_km_salida" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_cant_km_adicional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_km_llegada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_excedente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_recorrido_vehiculo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_total_km_recorrido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["movilizacion_costo_galon" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_movilizacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_movilizacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_movilizacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_fecha" + iSeqRow]["change"]) {
    return true;
  }
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
  if (scEventControl_data["movilizacion_funcionario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_funcionario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_hora_salida" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_hora_salida" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_total_combustible" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_total_combustible" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_hora_llegada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_hora_llegada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_total_galones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_total_galones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_km_salida" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_km_salida" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_cant_km_adicional" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_cant_km_adicional" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_km_llegada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_km_llegada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_excedente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_excedente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_recorrido_vehiculo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_recorrido_vehiculo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_total_km_recorrido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_total_km_recorrido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_costo_galon" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["movilizacion_costo_galon" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_movilizacion" + iSeqRow]["change"]) {
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
  if ("km_galon" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("movilizacion_km_llegada" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
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
  $('#id_sc_field_id_movilizacion' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_id_movilizacion_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_movilizacion_impresion_id_movilizacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_idvehiculo' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_idvehiculo_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_movilizacion_impresion_idvehiculo_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_movilizacion_impresion_idvehiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_idusuario' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_idusuario_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_movilizacion_impresion_idusuario_onchange(this, iSeqRow) })
                                       .bind('click', function() { sc_form_movilizacion_impresion_idusuario_onclick(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_movilizacion_impresion_idusuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_fecha' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_fecha_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_hora_salida' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_hora_salida_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_hora_salida_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_hora_llegada' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_hora_llegada_onblur(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_hora_llegada_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_km_salida' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_km_salida_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_km_salida_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_km_llegada' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_km_llegada_onblur(this, iSeqRow) })
                                                     .bind('change', function() { sc_form_movilizacion_impresion_movilizacion_km_llegada_onchange(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_km_llegada_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_costo_galon' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_costo_galon_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_costo_galon_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_cant_km_adicional' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_cant_km_adicional_onblur(this, iSeqRow) })
                                                            .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_cant_km_adicional_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_total_km_recorrido' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_total_km_recorrido_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_total_km_recorrido_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_recorrido_vehiculo' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_recorrido_vehiculo_onblur(this, iSeqRow) })
                                                             .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_recorrido_vehiculo_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_excedente' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_excedente_onblur(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_excedente_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_total_galones' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_total_galones_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_total_galones_onfocus(this, iSeqRow) });
  $('#id_sc_field_movilizacion_total_combustible' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_movilizacion_total_combustible_onblur(this, iSeqRow) })
                                                            .bind('focus', function() { sc_form_movilizacion_impresion_movilizacion_total_combustible_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_movilizacion' + iSeqRow).bind('blur', function() { sc_form_movilizacion_impresion_detalle_movilizacion_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_movilizacion_impresion_detalle_movilizacion_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_movilizacion_impresion_id_movilizacion_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_id_movilizacion();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_id_movilizacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_idvehiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_idvehiculo();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_idvehiculo_onchange(oThis, iSeqRow) {
  lookup_idvehiculo();
}

function sc_form_movilizacion_impresion_idvehiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_idusuario_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_idusuario();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_idusuario_onchange(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_refresh_idusuario();
}

function sc_form_movilizacion_impresion_idusuario_onclick(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_event_idusuario_onclick();
}

function sc_form_movilizacion_impresion_idusuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_funcionario_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_funcionario();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_funcionario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_fecha();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_hora_salida_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_hora_salida();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_hora_salida_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_hora_llegada_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_hora_llegada();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_hora_llegada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_km_salida_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_km_salida();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_km_salida_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_km_llegada_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_km_llegada();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_km_llegada_onchange(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_event_movilizacion_km_llegada_onchange();
}

function sc_form_movilizacion_impresion_movilizacion_km_llegada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_costo_galon_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_costo_galon();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_costo_galon_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_cant_km_adicional_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_cant_km_adicional();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_cant_km_adicional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_total_km_recorrido_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_total_km_recorrido();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_total_km_recorrido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_recorrido_vehiculo_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_recorrido_vehiculo();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_recorrido_vehiculo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_excedente_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_excedente();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_excedente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_total_galones_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_total_galones();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_total_galones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_total_combustible_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_movilizacion_total_combustible();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_movilizacion_total_combustible_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_movilizacion_impresion_detalle_movilizacion_onblur(oThis, iSeqRow) {
  do_ajax_form_movilizacion_impresion_validate_detalle_movilizacion();
  scCssBlur(oThis);
}

function sc_form_movilizacion_impresion_detalle_movilizacion_onfocus(oThis, iSeqRow) {
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
	if ("2" == block) {
		displayChange_block_2(status);
	}
	if ("3" == block) {
		displayChange_block_3(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("Id_Movilizacion", "", status);
	displayChange_field("Movilizacion_Fecha", "", status);
	displayChange_field("idusuario", "", status);
	displayChange_field("IdVehiculo", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("movilizacion_funcionario", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("Movilizacion_Hora_Salida", "", status);
	displayChange_field("movilizacion_total_combustible", "", status);
	displayChange_field("Movilizacion_Hora_Llegada", "", status);
	displayChange_field("Movilizacion_Total_Galones", "", status);
	displayChange_field("Movilizacion_Km_Salida", "", status);
	displayChange_field("movilizacion_cant_km_adicional", "", status);
	displayChange_field("Movilizacion_Km_Llegada", "", status);
	displayChange_field("movilizacion_Excedente", "", status);
	displayChange_field("movilizacion_Recorrido_Vehiculo", "", status);
	displayChange_field("Movilizacion_Total_Km_Recorrido", "", status);
	displayChange_field("Movilizacion_Costo_Galon", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("detalle_movilizacion", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_movilizacion(row, status);
	displayChange_field_movilizacion_fecha(row, status);
	displayChange_field_idusuario(row, status);
	displayChange_field_idvehiculo(row, status);
	displayChange_field_movilizacion_funcionario(row, status);
	displayChange_field_movilizacion_hora_salida(row, status);
	displayChange_field_movilizacion_total_combustible(row, status);
	displayChange_field_movilizacion_hora_llegada(row, status);
	displayChange_field_movilizacion_total_galones(row, status);
	displayChange_field_movilizacion_km_salida(row, status);
	displayChange_field_movilizacion_cant_km_adicional(row, status);
	displayChange_field_movilizacion_km_llegada(row, status);
	displayChange_field_movilizacion_excedente(row, status);
	displayChange_field_movilizacion_recorrido_vehiculo(row, status);
	displayChange_field_movilizacion_total_km_recorrido(row, status);
	displayChange_field_movilizacion_costo_galon(row, status);
	displayChange_field_detalle_movilizacion(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_movilizacion" == field) {
		displayChange_field_id_movilizacion(row, status);
	}
	if ("movilizacion_fecha" == field) {
		displayChange_field_movilizacion_fecha(row, status);
	}
	if ("idusuario" == field) {
		displayChange_field_idusuario(row, status);
	}
	if ("idvehiculo" == field) {
		displayChange_field_idvehiculo(row, status);
	}
	if ("movilizacion_funcionario" == field) {
		displayChange_field_movilizacion_funcionario(row, status);
	}
	if ("movilizacion_hora_salida" == field) {
		displayChange_field_movilizacion_hora_salida(row, status);
	}
	if ("movilizacion_total_combustible" == field) {
		displayChange_field_movilizacion_total_combustible(row, status);
	}
	if ("movilizacion_hora_llegada" == field) {
		displayChange_field_movilizacion_hora_llegada(row, status);
	}
	if ("movilizacion_total_galones" == field) {
		displayChange_field_movilizacion_total_galones(row, status);
	}
	if ("movilizacion_km_salida" == field) {
		displayChange_field_movilizacion_km_salida(row, status);
	}
	if ("movilizacion_cant_km_adicional" == field) {
		displayChange_field_movilizacion_cant_km_adicional(row, status);
	}
	if ("movilizacion_km_llegada" == field) {
		displayChange_field_movilizacion_km_llegada(row, status);
	}
	if ("movilizacion_excedente" == field) {
		displayChange_field_movilizacion_excedente(row, status);
	}
	if ("movilizacion_recorrido_vehiculo" == field) {
		displayChange_field_movilizacion_recorrido_vehiculo(row, status);
	}
	if ("movilizacion_total_km_recorrido" == field) {
		displayChange_field_movilizacion_total_km_recorrido(row, status);
	}
	if ("movilizacion_costo_galon" == field) {
		displayChange_field_movilizacion_costo_galon(row, status);
	}
	if ("detalle_movilizacion" == field) {
		displayChange_field_detalle_movilizacion(row, status);
	}
}

function displayChange_field_id_movilizacion(row, status) {
}

function displayChange_field_movilizacion_fecha(row, status) {
}

function displayChange_field_idusuario(row, status) {
}

function displayChange_field_idvehiculo(row, status) {
}

function displayChange_field_movilizacion_funcionario(row, status) {
}

function displayChange_field_movilizacion_hora_salida(row, status) {
}

function displayChange_field_movilizacion_total_combustible(row, status) {
}

function displayChange_field_movilizacion_hora_llegada(row, status) {
}

function displayChange_field_movilizacion_total_galones(row, status) {
}

function displayChange_field_movilizacion_km_salida(row, status) {
}

function displayChange_field_movilizacion_cant_km_adicional(row, status) {
}

function displayChange_field_movilizacion_km_llegada(row, status) {
}

function displayChange_field_movilizacion_excedente(row, status) {
}

function displayChange_field_movilizacion_recorrido_vehiculo(row, status) {
}

function displayChange_field_movilizacion_total_km_recorrido(row, status) {
}

function displayChange_field_movilizacion_costo_galon(row, status) {
}

function displayChange_field_detalle_movilizacion(row, status) {
}

function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_movilizacion_impresion_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(35);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_movilizacion_fecha" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_movilizacion_fecha" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_movilizacion_impresion_validate_movilizacion_fecha(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['movilizacion_fecha']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

