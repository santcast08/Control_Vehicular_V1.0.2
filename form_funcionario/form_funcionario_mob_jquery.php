
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
  scEventControl_data["usuario_cedula" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario_nombres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario_apellidos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario_correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario_cargo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario_dependencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuario_estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["usuario_cedula" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_cedula" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario_nombres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_nombres" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario_apellidos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_apellidos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario_correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario_cargo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_cargo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario_dependencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_dependencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuario_estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuario_estado" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("usuario_cargo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("usuario_dependencia" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("usuario_estado" + iSeq == fieldName) {
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
  $('#id_sc_field_usuario_cedula' + iSeqRow).bind('blur', function() { sc_form_funcionario_usuario_cedula_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_funcionario_usuario_cedula_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_nombres' + iSeqRow).bind('blur', function() { sc_form_funcionario_usuario_nombres_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_funcionario_usuario_nombres_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_apellidos' + iSeqRow).bind('blur', function() { sc_form_funcionario_usuario_apellidos_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_funcionario_usuario_apellidos_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_correo' + iSeqRow).bind('blur', function() { sc_form_funcionario_usuario_correo_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_funcionario_usuario_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_dependencia' + iSeqRow).bind('blur', function() { sc_form_funcionario_usuario_dependencia_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_funcionario_usuario_dependencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_cargo' + iSeqRow).bind('blur', function() { sc_form_funcionario_usuario_cargo_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_funcionario_usuario_cargo_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuario_estado' + iSeqRow).bind('blur', function() { sc_form_funcionario_usuario_estado_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_funcionario_usuario_estado_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_funcionario_usuario_cedula_onblur(oThis, iSeqRow) {
  do_ajax_form_funcionario_mob_validate_usuario_cedula();
  scCssBlur(oThis);
}

function sc_form_funcionario_usuario_cedula_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_usuario_nombres_onblur(oThis, iSeqRow) {
  do_ajax_form_funcionario_mob_validate_usuario_nombres();
  scCssBlur(oThis);
}

function sc_form_funcionario_usuario_nombres_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_usuario_apellidos_onblur(oThis, iSeqRow) {
  do_ajax_form_funcionario_mob_validate_usuario_apellidos();
  scCssBlur(oThis);
}

function sc_form_funcionario_usuario_apellidos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_usuario_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_funcionario_mob_validate_usuario_correo();
  scCssBlur(oThis);
}

function sc_form_funcionario_usuario_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_usuario_dependencia_onblur(oThis, iSeqRow) {
  do_ajax_form_funcionario_mob_validate_usuario_dependencia();
  scCssBlur(oThis);
}

function sc_form_funcionario_usuario_dependencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_usuario_cargo_onblur(oThis, iSeqRow) {
  do_ajax_form_funcionario_mob_validate_usuario_cargo();
  scCssBlur(oThis);
}

function sc_form_funcionario_usuario_cargo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_funcionario_usuario_estado_onblur(oThis, iSeqRow) {
  do_ajax_form_funcionario_mob_validate_usuario_estado();
  scCssBlur(oThis);
}

function sc_form_funcionario_usuario_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("usuario_cedula", "", status);
	displayChange_field("usuario_nombres", "", status);
	displayChange_field("usuario_apellidos", "", status);
	displayChange_field("usuario_correo", "", status);
	displayChange_field("usuario_cargo", "", status);
	displayChange_field("usuario_dependencia", "", status);
	displayChange_field("usuario_estado", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_usuario_cedula(row, status);
	displayChange_field_usuario_nombres(row, status);
	displayChange_field_usuario_apellidos(row, status);
	displayChange_field_usuario_correo(row, status);
	displayChange_field_usuario_cargo(row, status);
	displayChange_field_usuario_dependencia(row, status);
	displayChange_field_usuario_estado(row, status);
}

function displayChange_field(field, row, status) {
	if ("usuario_cedula" == field) {
		displayChange_field_usuario_cedula(row, status);
	}
	if ("usuario_nombres" == field) {
		displayChange_field_usuario_nombres(row, status);
	}
	if ("usuario_apellidos" == field) {
		displayChange_field_usuario_apellidos(row, status);
	}
	if ("usuario_correo" == field) {
		displayChange_field_usuario_correo(row, status);
	}
	if ("usuario_cargo" == field) {
		displayChange_field_usuario_cargo(row, status);
	}
	if ("usuario_dependencia" == field) {
		displayChange_field_usuario_dependencia(row, status);
	}
	if ("usuario_estado" == field) {
		displayChange_field_usuario_estado(row, status);
	}
}

function displayChange_field_usuario_cedula(row, status) {
}

function displayChange_field_usuario_nombres(row, status) {
}

function displayChange_field_usuario_apellidos(row, status) {
}

function displayChange_field_usuario_correo(row, status) {
}

function displayChange_field_usuario_cargo(row, status) {
}

function displayChange_field_usuario_dependencia(row, status) {
}

function displayChange_field_usuario_estado(row, status) {
}

function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_funcionario_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
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
