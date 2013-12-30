jQuery.fn.textLimit = function (options) {
    opts = $.extend({}, jQuery.fn.textLimit.defaults, options);

    this.data('limit', opts.limit);
    var lengthField = null;
    if (opts.fieldLengthSelector) {
	lengthField = $(opts.fieldLengthSelector);
	this.data('lengthField', lengthField);
    }
    //if the limit is a field in the form
    if (lengthField) {
	//if the length field is used by more than one limited text field
	associatedLimitedFields = lengthField.data('textfields');
	if (!$.isArray(associatedLimitedFields)) {
	    associatedLimitedFields = new Array();
	}
	associatedLimitedFields.push(this);
	lengthField.data('textfields', associatedLimitedFields);

	lengthField.keyup(jQuery.fn.textLimit.fieldLengthModified);
    }
    //bind the keyup
    this.keyup(jQuery.fn.textLimit.limitedTextModified);
    //trigger it for the first time
    this.keyup();
    return this;
};

//options that can be overwitten
jQuery.fn.textLimit.defaults = {
	fieldLengthSelector: false,
	limit: 10
    };

jQuery.fn.textLimit.fieldLengthModified = function () {
    limitedFields = $(this).data('textfields');
    if (!isNaN($(this).val())){
	for (var i = 0; limitedFields.length; i++) {
	    //update all limited fields
	    associatedLimitedFields.data('limit', $(this).val() );
	    associatedLimitedFields.keyup();
	}
    }
}
//keyup binded
jQuery.fn.textLimit.limitedTextModified = function () {
    var $this = $(this);
    var textlimit = $this.data('limit');
    
    newlength = textlimit - $this.val().length;

    if (newlength < 0) {
	$this.val($this.val().substr(0,textlimit));
	newlength = 0;
    }
    jQuery.fn.textLimit.formatMessage($this, textlimit, newlength);
    
}

//if you redefine this function, make sure you give a unique id to your message box/div...
jQuery.fn.textLimit.formatMessage = function (limitedField, limit, left) {
    var limit_id = $(limitedField).attr('id') + '_left';
    if (left <= 0) {
	
	$('#'+ limit_id ).addClass('error');
    } else {
	$('#'+ limit_id ).removeClass('error');
    }
    $('#'+ limit_id ).html(newlength);

}

