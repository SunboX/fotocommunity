function swfUploadLoaded() {
	if(document.getElementById("Form_"+form_name)) {
		form = document.getElementById("Form_"+form_name);
	}
	else {
		for(var i = 0; i < document.forms.length; i++) {
			if(document.forms[i].action.match(form_name)) {
				form = document.forms[i];
				break;
			}
		}
	}

	inputs = form.getElementsByTagName("input");
	
	for(var i = 0; i < inputs.length; i++)
	{
		if(inputs[i].type == 'submit')
		{
			btnSubmit = inputs[i];
			break;
		}
	}
	
	btnSubmit.onclick = doSubmit;
	if(required) {
		btnSubmit.style.display = 'none';
	}
	txtFileNames = document.getElementById("file_list");


}


function fileBrowse() {
	if(this.settings.file_upload_limit > 1)
		this.selectFiles();
	else
		this.selectFile();
}


// Called by the submit button to start the upload
function doSubmit(e) {
	
	e = e || window.event;
	if (e.stopPropagation) {
		e.stopPropagation();
	}
	e.cancelBubble = true;
	
	try {
		var params = swfu.settings.post_params;
		for(var name in params) {
			if(name.match('__dynamic__')) {
				key = name.replace('__dynamic__','');
				value = document.getElementById(params[name]).value;
				swfu.addPostParam(key,value);
			}
		}
		if( typeof(form.onsubmit == 'undefined') || (typeof(form.onsubmit == 'function' ) && form.onsubmit())) {
			btnSubmit.disabled=true;
			swfu.startUpload();
		}
	} catch (ex) {
		alert(ex);
	}
	return false;
}

 // Called by the queue complete handler to submit the form
function uploadDone() {
}

function uploadStart()
{
	
}


function fileQueueError(file, errorCode, message)  {
	try {
		// Handle this error separately because we don't want to create a FileProgress element for it.
		switch (errorCode) {
		case SWFUpload.QUEUE_ERROR.QUEUE_LIMIT_EXCEEDED:
			alert("You have attempted to queue too many files.\n" + (message == 0 ? "You have reached the upload limit." : "You may select " + (message > 1 ? "up to " + message + " files." : message)));
			return;
		case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
			size = file.size/1024/1024
			alert("The file you selected is too big. The maximum size allowed is " + (Math.round(size*10)/10)+'M');
			this.debug("Error Code: File too big, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			return;
		case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
			alert("The file you selected is empty.  Please select another file.");
			this.debug("Error Code: Zero byte file, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			return;
		case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
			alert("The file you choose is not an allowed file type.");
			this.debug("Error Code: Invalid File Type, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			return;
		default:
			alert("An error occurred in the upload. Try again later.");
			this.debug("Error Code: " + errorCode + ", File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			return;
		}
	} catch (e) {
	}
}

function fileQueued(file) {
	try {
		li = document.createElement("li");
		li.setAttribute('id', 'file-' + file.id);
		li.innerHTML = "<div class='queue-file-name'>" + file.name + "</div><div class='queue-remove-btn'><a href='javascript:void(0);' onclick='return removeFileFromQueue(\""+file.id+"\");'>remove<a></div>";
		txtFileNames.appendChild(li);
		btnSubmit.style.display = 'block';
	} catch (e) {
	}

}

function removeFileFromQueue(file_id) {
	swfu.cancelUpload(file_id);
	txtFileNames.removeChild(document.getElementById("file-"+file_id));
	if(!txtFileNames.childNodes.length) {
		btnSubmit.style.display = 'none';
	}
	return false;
}

function fileDialogStart(numFilesSelected, numFilesQueued)
{

}
function fileDialogComplete(numFilesSelected, numFilesQueued) {
	
}

function uploadProgress(file, bytesLoaded, bytesTotal) {
	try {
		var percent = Math.ceil((bytesLoaded / bytesTotal) * 100);

		//file.id = "singlefile";	// This makes it so FileProgress only makes a single UI element, instead of one for each file
		var progress = new FileProgress(file, 'file-' + file.id);
		progress.setProgress(percent);
		progress.setStatus("Uploading...");
	} catch (e) {
		alert(e);
	}
}

function uploadSuccess(file, serverData) {
	try {
		if(swfu.settings.debug)
			alert("Server said " + serverData);
			
		//file.id = "singlefile";	// This makes it so FileProgress only makes a single UI element, instead of one for each file
		var progress = new FileProgress(file, 'file-' + file.id);
		progress.setComplete();
		progress.setStatus("Complete.");
		progress.toggleCancel(false);
		
		if (serverData === " ") {
			this.customSettings.upload_successful = false;
		} else {
			this.customSettings.upload_successful = true;
			hidden = document.createElement('input');
			hidden.setAttribute('type','hidden');
			hidden.setAttribute('value', serverData);
			hidden.setAttribute('name','uploaded_files[]');
			form.appendChild(hidden);
		}
		
	} catch (e) {
		alert(e);
	}
}

function uploadComplete(file) {
	try {
		if (this.customSettings.upload_successful) {
	
			//btnBrowse.disabled = "true";
			try {
				if (this.getStats().files_queued > 0) {
					swfu.startUpload();
				}
				else {
					if(!swfu.settings.debug)
						form.submit();
				}
			} catch (ex) {
				alert("Error submitting form:" + ex);
			}
		} else {
			txtFileNames.removeChild(document.getElementById("file-"+file.id));
			alert("There was a problem with the upload.\nThe server did not accept it.\n ");
		}
	} catch (e) {
	}
}

function uploadError(file, errorCode, message) {
	try {
		
		// Handle this error separately because we don't want to create a FileProgress element for it.
		switch (errorCode) {
		case SWFUpload.UPLOAD_ERROR.MISSING_UPLOAD_URL:
			alert("There was a configuration error.  You will not be able to upload a resume at this time.");
			this.debug("Error Code: No backend file, File name: " + file.name + ", Message: " + message);
			return;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED:
			alert("You may only upload 1 file.");
			this.debug("Error Code: Upload Limit Exceeded, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			return;
		case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
		case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
			break;
		default:
			//alert("An error occurred in the upload. Try again later.");
			alert("Error Code: " + errorCode + ", File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			return;
		}

		switch (errorCode) {
		case SWFUpload.UPLOAD_ERROR.HTTP_ERROR:
			progress.setStatus("Upload Error");
			this.debug("Error Code: HTTP Error, File name: " + file.name + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_FAILED:
			progress.setStatus("Upload Failed.");
			this.debug("Error Code: Upload Failed, File name: " + file.name + ", File size: " + file.size + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.IO_ERROR:
			progress.setStatus("Server (IO) Error");
			this.debug("Error Code: IO Error, File name: " + file.name + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.SECURITY_ERROR:
			progress.setStatus("Security Error");
			this.debug("Error Code: Security Error, File name: " + file.name + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
			progress.setStatus("Upload Cancelled");
			this.debug("Error Code: Upload Cancelled, File name: " + file.name + ", Message: " + message);
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
			progress.setStatus("Upload Stopped");
			this.debug("Error Code: Upload Stopped, File name: " + file.name + ", Message: " + message);
			break;
		}
	} catch (ex) {
	}
	
	
}