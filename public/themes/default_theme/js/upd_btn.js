const fileInput = document.getElementById('file_input');
const uploadBtn = document.getElementById('btn_upload');
const submitBtn = document.getElementById('btn_submit');

uploadBtn.addEventListener('click', () => fileInput.click());

fileInput.addEventListener('change', () => {
if(fileInput.files.length > 0){
uploadBtn.textContent = fileInput.files[0].name;
submitBtn.classList.add('active');
} else {
uploadBtn.textContent = 'Upload profile image';
submitBtn.classList.remove('active');
}
});
