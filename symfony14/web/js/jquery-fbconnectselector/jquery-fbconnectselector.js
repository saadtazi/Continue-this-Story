/*
 * Please read the README file
 */


jQuery.fn.extend({
	friendselector : function (options) {
	    opts = $.extend({}, jQuery.fn.friendselector.defaults, options);
	    this.data('hiddenfieldname', opts.hiddenfieldname);
	   jQuery.fn.friendselector.getFriends(this, opts);
	   return this;
	}
	

});
//defaults available to user for modification (public)
jQuery.fn.friendselector.defaults = {
	hiddenfieldname: 'friendselector',
	includecurrentuser: true
    };

//if you want to customi«e the "dropdown" "look and feel"
jQuery.fn.friendselector.formatOption = function(row, i, max) {
    return row.name + ' <img src="' + row.pic_small + '"/>';
}

//if you want to customi«e the "dropdown" "look and feel"
jQuery.fn.friendselector.formatAutocompleteResult = function(event, fienddata, formatted) {
    if (fienddata) {
	$(this).val('');
	var hiddenfieldname = $(this).data('hiddenfieldname');

	var afriendselected = '<li><input type="hidden" value="' + fienddata.uid + '" name="'+hiddenfieldname+'">'+ fienddata.name + ' <img src="' + fienddata.pic_small + '"/><a class="b_delete" href="javascript:;" onclick="removeSelectedFriend(this, \'#'+ $(this).attr('id') + '\')">delete</a></li>';
	if (!$(this).prev().is('ul')) {
	    afriendselected = '<ul>' + afriendselected + '</ul>';
	    $(this).before(afriendselected);
	} else {
	    $(this).prev().append(afriendselected);
	}

	//alert($(this).hasClass('single'));
	if ($(this).hasClass('fbs_single')) {
	    $(this).hide();
	}
    }
}



jQuery.fn.friendselector.getFriends  = function(field, opts) {
	 var userid = FB.Connect.get_loggedInUser();
        if (userid) {
            var $selectorField = $(field);
            var query = "SELECT uid, name, pic_small FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = "  + userid + ")";
            if (opts.includecurrentuser) {
                query = query + " OR uid = " + userid;
            }

            FB.Facebook.apiClient.fql_query(query, function(result, ex) {

                $selectorField.autocomplete(result, {
                    multiple: 'yes',
                    formatItem: jQuery.fn.friendselector.formatOption,
                    formatMatch: function(row, i, max) {
                        return row.name;
                    }
                } );
                $selectorField.show();
                $selectorField.result(jQuery.fn.friendselector.formatAutocompleteResult);
            });
        }

    }



    function removeSelectedFriend (deleteButton, selectorField) {
        //remove the li
        //alert('html: ' + $(deleteButton).html());
        $li = $(deleteButton).parent();
        $ul = $li.parent();
        $li.remove();

        if ($ul.children().length == 0) {
            $(selectorField).show();
        }
    }

