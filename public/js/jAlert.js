function jAlert(contentAlert, colorAlert, showButton){
	if (colorAlert != 'red' && colorAlert != 'green' && colorAlert != 'blue'){
		colorAlert = 'red';
	}

	if (showButton != true && showButton != false){
		showButton = true;
	}

	var body = document.getElementsByTagName('body');
		body = body[0];

	var LockBody = document.createElement('div');
		LockBody.className = 'LockBody';

	body.appendChild(LockBody);

	var jAlertPopupBorder = document.createElement('div');
		jAlertPopupBorder.className = 'jAlertPopupBorder ' + colorAlert + '-bd';

	LockBody.appendChild(jAlertPopupBorder);

	var jAlertPopup = document.createElement('div');
		jAlertPopup.className = 'jAlertPopup';

	jAlertPopupBorder.appendChild(jAlertPopup);

	var jAlertPopupContent = document.createElement('div');
		jAlertPopupContent.className = 'jAlertPopupContent ' + colorAlert + '-cl';
		jAlertPopupContent.innerHTML = contentAlert;

	jAlertPopup.appendChild(jAlertPopupContent);

	if (showButton == true){
		var jAlertPopupButton = document.createElement('div');
			jAlertPopupButton.className = 'jAlertPopupButton';

		jAlertPopup.appendChild(jAlertPopupButton);

		var jAlertButton = document.createElement('span');
			jAlertButton.className = 'jAlertButton ' + colorAlert + '-bg';
			jAlertButton.setAttribute('id', 'jAlertClose');
			jAlertButton.innerHTML = 'OK';

		jAlertPopupButton.appendChild(jAlertButton);

		document.getElementById('jAlertClose').onclick = function(){
			jAlertClose();
		}
	}
}

function jAlertTutorial(nameTuts, contentTuts, flagReload){
	if (flagReload != true && flagReload != false){
		flagReload = false;
	}

	var body = document.getElementsByTagName('body');
		body = body[0];

	var LockBody = document.createElement('div');
		LockBody.className = 'LockBody';

	body.appendChild(LockBody);

	var jAlertPopupBorder = document.createElement('div');
		jAlertPopupBorder.className = 'jAlertPopupBorderTuts red-bd';

	LockBody.appendChild(jAlertPopupBorder);

	var jAlertPopup = document.createElement('div');
		jAlertPopup.className = 'jAlertPopup';

	jAlertPopupBorder.appendChild(jAlertPopup);

	var jAlertPopupHead = document.createElement('div');
		jAlertPopupHead.className = 'jAlertPopupHead';
		jAlertPopupHead.innerHTML = nameTuts;

	jAlertPopup.appendChild(jAlertPopupHead);

	var jAlertPopupContent = document.createElement('div');
		jAlertPopupContent.className = 'jAlertPopupContentTuts blue-cl';
		jAlertPopupContent.innerHTML = contentTuts;

	jAlertPopup.appendChild(jAlertPopupContent);

	var jAlertPopupButton = document.createElement('div');
		jAlertPopupButton.className = 'jAlertPopupButton';

	jAlertPopup.appendChild(jAlertPopupButton);

	var jAlertButton = document.createElement('span');
		jAlertButton.className = 'jAlertButton red-bg';
		jAlertButton.setAttribute('id', 'jAlertClose');
		jAlertButton.innerHTML = 'OK';

	jAlertPopupButton.appendChild(jAlertButton);

	document.getElementById('jAlertClose').onclick = function(){
		if (flagReload == true){
			location.reload(true);
		}else{
			jAlertClose();
		}
	}
}

function jAlertClose(){
	var LockBody = document.getElementsByClassName('LockBody');
		LockBody[0].parentNode.removeChild(LockBody[0]);
}