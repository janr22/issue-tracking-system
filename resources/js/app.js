require('./bootstrap');
import TextareaMarkdown from 'textarea-markdown'

document.addEventListener('DOMContentLoaded', () => {
  const token = document.querySelector("meta[name=\"csrf-token\"]").content;
  const textarea = document.querySelector('#editor');

  new TextareaMarkdown(textarea, {
    endPoint: '/api/image.json',
    paramName: 'file',
    responseKey: 'url',
    csrfToken: null,
    placeholder: 'uploading %filename ...'
  })
});