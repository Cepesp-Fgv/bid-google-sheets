import Papa from 'papaparse';

const urlInput = $('#url-input');
const detectedSeparatorInput = $('#detected-separator-input');
const separatorInput = $('#separator-input');
const encodingInput = $('#encoding-input');
const previewTable = $('#preview-table');
const urlValidFeedback = $('#urlValidFeedback');
const urlInvalidFeedback = $('#urlInvalidFeedback');
const submitBtn = $('.btn[type=submit]');

urlInput.focusout(syncPreview);
separatorInput.change(syncPreview);
encodingInput.change(syncPreview);
$(document).ready(syncPreview);

function syncPreview() {
    const url = urlInput.val();
    const encoding = encodingInput.val();
    const separator = parseSeparator(separatorInput.val());

    submitBtn.prop('disabled', true);

    clearError();

    if (!url)
        return;

    Papa.parse('/pipe?encoding=' + encoding + '&url=' + encodeURI(url), {
        download: true,
        delimiter: separator,
        preview: 10,
        skipEmptyLines: true,
        complete: (results, file) => {
            showSuccess();
            detectedSeparatorInput.val(results.meta.delimiter);
            showPreview(results.data);
        },
        error: () => {
            showError();
        }
    })
}

function showPreview(results) {
    previewTable.html(''); // Clear HTML

    function buildRow(row) {
        let tr = $('<tr></tr>');
        for (let column of row) {
            let td = $('<td></td>');
            td.text(column);
            tr.append(td);
        }

        previewTable.append(tr);
    }

    for (let row of results) {
        previewTable.append(buildRow(row));
    }
}

function parseSeparator(value) {
    if (!value)
        return "";

    switch (value) {
        case "COMMA":
            return ',';
        case "TAB":
            return '\t';
        default:
        case "SEMICOLON":
            return ';';
    }
}

function clearError() {
    urlInput.removeClass('is-invalid').removeClass('is-valid');
    urlValidFeedback.hide();
    urlInvalidFeedback.hide();
}

function showError() {
    urlInput.addClass('is-invalid');
    urlInvalidFeedback.show();
}

function showSuccess() {
    urlInput.addClass('is-valid');
    urlValidFeedback.show();
    submitBtn.prop('disabled', false);
}
