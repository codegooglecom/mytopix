function setSelectionRange(input, selectionStart, selectionEnd)
{
	if (input.setSelectionRange)
	{
		input.focus();
		input.setSelectionRange(selectionStart, selectionEnd);
		moz_scrollIntoView(input, selectionStart);
	}
	else if (input.createTextRange)
	{
		var range = input.createTextRange();
		range.collapse(true);
		range.moveEnd('character', selectionEnd);
		range.moveStart('character', selectionStart);
		range.select();
	}
}

function selectString (input, string)
{
	var match  = new RegExp(string, "i").exec(input.value.replace(/\r\n|\r|\n/g, ' '));
	if (match)
	{
	setSelectionRange (input, match.index, match.index + match[0].length);
	}
}

function moz_scrollIntoView(input, selectionStart)
{
	var TESTAREA = document.createElement('TEXTAREA');
	TESTAREA.setAttribute('style', 'visibility: hidden;');
	TESTAREA.style.width = input.offsetWidth;
	TESTAREA.style.height = input.offsetHeight;
	while (input.value.charAt(selectionStart).search(/\r\n|\r|\n/g))
		--selectionStart;
	TESTAREA.appendChild(document.createTextNode(input.value.substring(0, selectionStart)));
	document.body.appendChild(TESTAREA);
		var voodoo_factor = 36;
	if (TESTAREA.scrollHeight <= input.scrollTop || 
		TESTAREA.scrollHeight >= input.scrollTop + input.offsetHeight)
		input.scrollTop = TESTAREA.scrollHeight - TESTAREA.offsetHeight + voodoo_factor;

	TESTAREA.setAttribute('style', 'display: none;');
}

function toggle(id)
{
	if (document.getElementById(id).style.display == "") {
		show = "none";
	} else {
		show = "";
	}
	document.getElementById(id).style.display = show;
}

function confirmSynch()
{
	remove = confirm('Resynchronizing the systems statistics can cause a VERY HIGH amount of server overhead. Continue?');

	if(remove) return true;

	return false;
}