
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
  scEventControl_data["rutas_origen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rutas_destino" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rutas_distancia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["rutas_origen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rutas_origen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rutas_destino" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rutas_destino" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rutas_distancia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rutas_distancia" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  $('#id_sc_field_rutas_destino' + iSeqRow).bind('blur', function() { sc_form_rutas_rutas_destino_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_rutas_rutas_destino_onfocus(this, iSeqRow) });
  $('#id_sc_field_rutas_origen' + iSeqRow).bind('blur', function() { sc_form_rutas_rutas_origen_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_rutas_rutas_origen_onfocus(this, iSeqRow) });
  $('#id_sc_field_rutas_distancia' + iSeqRow).bind('blur', function() { sc_form_rutas_rutas_distancia_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_rutas_rutas_distancia_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_rutas_rutas_destino_onblur(oThis, iSeqRow) {
  do_ajax_form_rutas_mob_validate_rutas_destino();
  scCssBlur(oThis);
}

function sc_form_rutas_rutas_destino_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rutas_rutas_origen_onblur(oThis, iSeqRow) {
  do_ajax_form_rutas_mob_validate_rutas_origen();
  scCssBlur(oThis);
}

function sc_form_rutas_rutas_origen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_rutas_rutas_distancia_onblur(oThis, iSeqRow) {
  do_ajax_form_rutas_mob_validate_rutas_distancia();
  scCssBlur(oThis);
}

function sc_form_rutas_rutas_distancia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("rutas_Origen", "", status);
	displayChange_field("rutas_Destino", "", status);
	displayChange_field("Rutas_Distancia", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_rutas_origen(row, status);
	displayChange_field_rutas_destino(row, status);
	displayChange_field_rutas_distancia(row, status);
}

function displayChange_field(field, row, status) {
	if ("rutas_origen" == field) {
		displayChange_field_rutas_origen(row, status);
	}
	if ("rutas_destino" == field) {
		displayChange_field_rutas_destino(row, status);
	}
	if ("rutas_distancia" == field) {
		displayChange_field_rutas_distancia(row, status);
	}
}

function displayChange_field_rutas_origen(row, status) {
}

function displayChange_field_rutas_destino(row, status) {
}

function displayChange_field_rutas_distancia(row, status) {
}

function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_rutas_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
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
