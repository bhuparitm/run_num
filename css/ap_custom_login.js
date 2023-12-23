/* eslint-disable */
var ap_custom_login = (function (exports) {
	'use strict';

	var domainCheck = new RegExp(/.*[^.]+\.[^.]+/);
	function validateEmail(email) {
	    try {
	        if (!email)
	            return false;
	        if (typeof email !== "string")
	            return false;
	        var trimmed = email.trim();
	        var parts = trimmed.split("@");
	        if (parts.length < 2)
	            return false;
	        if (!parts[0])
	            return false;
	        if (!parts[parts.length - 1])
	            return false;
	        if (!domainCheck.test(parts[parts.length - 1]))
	            return false;
	        return true;
	    }
	    catch (err) {
	        return false;
	    }
	}
	function hasValue(elementSelector) {
	    var value = $(elementSelector).val();
	    if (typeof value === "string") {
	        return value.trim().length !== 0;
	    }
	    if (typeof value === "number") {
	        return true;
	    }
	    return false;
	}
	function sameValue(element1, element2) {
	    var value1 = $(element1).val();
	    var value2 = $(element2).val();
	    if (typeof value1 === "string" && typeof value2 === "string") {
	        return value1.trim() === value2.trim();
	    }
	    if (typeof value1 === "number" && typeof value2 === "number") {
	        return value1 === value2;
	    }
	    return false;
	}
	function getStringValue(element1) {
	    var val = $(element1).val();
	    if (typeof val === "string")
	        return val;
	    if (typeof val === "number")
	        return val.toString(10);
	    return "";
	}

	function onDocumentReady() {
	    setSubmitEnabled(false);
	    $('[id$=loginemail]').on('input', checkInput);
	    $('[id$=loginemail]').focus();
	    checkInput();
	}
	function setSubmitEnabled(value) {
	    if (value) {
	        $('[id$=forgotsubmit]').prop("disabled", false);
	    }
	    else {
	        $('[id$=forgotsubmit]').prop("disabled", true);
	    }
	}
	function checkInput() {
	    var canSubmit = true;
	    canSubmit = canSubmit && validateEmail($('[id$=loginemail]').val());
	    setSubmitEnabled(canSubmit);
	}

	var forgot = /*#__PURE__*/Object.freeze({
		__proto__: null,
		onDocumentReady: onDocumentReady,
		setSubmitEnabled: setSubmitEnabled,
		checkInput: checkInput
	});

	function onDocumentReady$1(resendCallback) {
	    $('[id$=resendlink]').on('click', resendCallback);
	}

	var forgotconfirm = /*#__PURE__*/Object.freeze({
		__proto__: null,
		onDocumentReady: onDocumentReady$1
	});

	function onDocumentReady$2(hasErrors) {
	    setSubmitEnabled$1(false);
	    $('[id$=loginpassword]').on('input', checkInput$1);
	    $('[id$=loginemail]').on('input', checkInput$1);
	    if (hasValue('[id$=loginemail]')) {
	        $('[id$=loginpassword]').focus();
	    }
	    else {
	        $('[id$=loginemail]').focus();
	    }
	    if (hasErrors) {
	        $('[id$=loginemail]').toggleClass("field-error", true);
	        $('[id$=loginpassword]').toggleClass("field-error", true);
	    }
	    checkInput$1();
	    // browser autofill is not detectable in general, so checking explicitly after a bit
	    setTimeout(checkInput$1, 300);
	}
	function setSubmitEnabled$1(value) {
	    if (value) {
	        $('[id$=loginsubmit]').prop("disabled", false);
	    }
	    else {
	        $('[id$=loginsubmit]').prop("disabled", true);
	    }
	}
	function checkInput$1() {
	    setSubmitEnabled$1(hasValue('[id$=loginpassword]') && hasValue('[id$=loginemail]'));
	}

	var login = /*#__PURE__*/Object.freeze({
		__proto__: null,
		onDocumentReady: onDocumentReady$2,
		setSubmitEnabled: setSubmitEnabled$1,
		checkInput: checkInput$1
	});

	function setSubmitEnabled$2(value) {
	    if (value) {
	        $('[id$=signupsubmit]').prop("disabled", false);
	    }
	    else {
	        $('[id$=signupsubmit]').prop("disabled", true);
	    }
	}
	function onDocumentReady$3(hasErrors) {
	    setSubmitEnabled$2(false);
	    $('[id$=userFirstName]').on('input', function () { return checkInput$2(true); });
	    $('[id$=userLastName]').on('input', function () { return checkInput$2(true); });
	    $('[id$=userEmail]').on('input', function () { return checkInput$2(true); });
	    $('[id$=userConfirmEmail]').on('input', function () { return checkInput$2(false); });
	    $('[id$=userFirstName]').focus();
	    $('[id$=userFirstName]').focusout(function () { return checkFirstName(false); });
	    $('[id$=userLastName]').focusout(function () { return checkLastName(false); });
	    $('[id$=userEmail]').focusout(function () { return checkEmail(false); });
	    $('[id$=userConfirmEmail]').focusout(function () { return checkEmail(false); });
	    if (hasErrors) {
	        checkInput$2(false);
	    }
	}
	function checkInput$2(clearOnly) {
	    var canSubmit = true;
	    canSubmit = checkFirstName(clearOnly) && canSubmit;
	    canSubmit = checkLastName(clearOnly) && canSubmit;
	    canSubmit = checkEmail(clearOnly) && canSubmit;
	    canSubmit = canSubmit && grecaptcha.getResponse && grecaptcha.getResponse().length > 0;
	    setSubmitEnabled$2(canSubmit);
	}
	function checkFirstName(clearOnly) {
	    if (hasValue('[id$=userFirstName]')) {
	        $('[id$=userFirstName]').toggleClass("field-error", false);
	        $('[id$=userFirstNameError]').css('visibility', 'hidden');
	        return true;
	    }
	    else {
	        if (!clearOnly) {
	            $('[id$=userFirstName]').toggleClass("field-error", true);
	            $('[id$=userFirstNameError]').css('visibility', 'visible');
	        }
	        return false;
	    }
	}
	function checkLastName(clearOnly) {
	    if (hasValue('[id$=userLastName]')) {
	        $('[id$=userLastName]').toggleClass("field-error", false);
	        $('[id$=userLastNameError]').css('visibility', 'hidden');
	        return true;
	    }
	    else {
	        if (!clearOnly) {
	            $('[id$=userLastName]').toggleClass("field-error", true);
	            $('[id$=userLastNameError]').css('visibility', 'visible');
	        }
	        return false;
	    }
	}
	function checkEmail(clearOnly) {
	    if (validateEmail($('[id$=userEmail]').val())) {
	        $('[id$=userEmail]').toggleClass("field-error", false);
	        $('[id$=userEmailError]').css('visibility', 'hidden');
	        if (sameValue('[id$=userEmail]', '[id$=userConfirmEmail]')) {
	            $('[id$=userConfirmEmail]').toggleClass("field-error", false);
	            $('[id$=userConfirmEmailError]').css('visibility', 'hidden');
	            return true;
	        }
	        else {
	            if (!clearOnly) {
	                $('[id$=userConfirmEmail]').toggleClass("field-error", true);
	                $('[id$=userConfirmEmailError]').css('visibility', 'visible');
	            }
	        }
	    }
	    else {
	        if (!clearOnly) {
	            $('[id$=userEmail]').toggleClass("field-error", true);
	            $('[id$=userEmailError]').css('visibility', 'visible');
	        }
	    }
	    return false;
	}
	function checkValues() {
	    checkFirstName(false);
	    checkLastName(false);
	    checkEmail(false);
	}
	function recaptchaLoaded(publicKey) {
	    $('[id$=recaptchaPlaceholder]').hide();
	    grecaptcha.render("recaptcha", {
	        "sitekey": publicKey,
	        "size": "normal",
	        "callback": recaptchaSucceeded,
	        "expired-callback": recaptchaExpired,
	        "error-callback": recaptchaFailed,
	    });
	}
	function recaptchaSucceeded() {
	    checkInput$2(true);
	}
	function recaptchaExpired() {
	    checkInput$2(true);
	    grecaptcha.reset();
	}
	function recaptchaFailed() {
	    checkInput$2(true);
	    grecaptcha.reset();
	}

	var signup = /*#__PURE__*/Object.freeze({
		__proto__: null,
		setSubmitEnabled: setSubmitEnabled$2,
		onDocumentReady: onDocumentReady$3,
		checkInput: checkInput$2,
		checkFirstName: checkFirstName,
		checkLastName: checkLastName,
		checkEmail: checkEmail,
		checkValues: checkValues,
		recaptchaLoaded: recaptchaLoaded,
		recaptchaSucceeded: recaptchaSucceeded,
		recaptchaExpired: recaptchaExpired,
		recaptchaFailed: recaptchaFailed
	});

	function onDocumentReady$4(hasErrors) {
	    setSubmitEnabled$3(false);
	    $('[id$=newpassword]').on('input', checkInput$3);
	    $('[id$=confirmpassword]').on('input', checkInput$3);
	    $('[id$=newpassword]').focus();
	    if (hasErrors) {
	        $('[id$=newpassword]').toggleClass("field-error", true);
	        $('[id$=confirmpassword]').toggleClass("field-error", true);
	    }
	    checkInput$3();
	}
	function setSubmitEnabled$3(value) {
	    if (value) {
	        $('[id$=passwordsubmit]').prop("disabled", false);
	    }
	    else {
	        $('[id$=passwordsubmit]').prop("disabled", true);
	    }
	}
	var rule2Check = new RegExp(/.*[a-zA-Z]+.*/);
	var rule3Check = new RegExp(/.*[0-9]+.*/);
	function canSubmit() {
	    var rule1 = true;
	    var rule2 = true;
	    var rule3 = true;
	    var match = true;
	    if (!sameValue('[id$=newpassword]', '[id$=confirmpassword]'))
	        match = false;
	    var val = getStringValue('[id$=newpassword]');
	    if (val.length < 8)
	        rule1 = false;
	    if (!rule2Check.test(val))
	        rule2 = false;
	    if (!rule3Check.test(val))
	        rule3 = false;
	    return { pass: rule1 && rule2 && rule3 && match, rule1: rule1, rule2: rule2, rule3: rule3, match: match };
	}
	function checkInput$3() {
	    var status = canSubmit();
	    setSubmitEnabled$3(status.pass);
	    $('[id$=rule1]').prop("checked", status.rule1);
	    $('[id$=rule2]').prop("checked", status.rule2);
	    $('[id$=rule3]').prop("checked", status.rule3);
	    if (status.match)
	        $('[id$=matchError]').css('visibility', 'hidden');
	    else
	        $('[id$=matchError]').css('visibility', 'visible');
	}

	var setpassword = /*#__PURE__*/Object.freeze({
		__proto__: null,
		onDocumentReady: onDocumentReady$4,
		setSubmitEnabled: setSubmitEnabled$3,
		checkInput: checkInput$3
	});

	exports.Forgot = forgot;
	exports.ForgotConfirm = forgotconfirm;
	exports.Login = login;
	exports.SetPassword = setpassword;
	exports.SignUp = signup;

	return exports;

}({}));
//# sourceMappingURL=ap_custom_login.js.map
