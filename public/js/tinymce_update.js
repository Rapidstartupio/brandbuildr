
function tinymce_init_callback(editor)
{
	console.log("tinymce_init_callback /v.2");
	

	//editor.remove();
    //editor = null;
    tinymce.baseURL = $('meta[name="assets-path"]').attr('content')+'/../../tinymce';
	tinymce.suffix =".min";
    tinymce.remove('textarea.richTextBox[name="body"]');
	 tinymce.init({
	  selector: 'textarea.richTextBox[name="body"]',
	  plugins: 'codesample,link, image, code, table, textcolor, lists',
	  extended_valid_elements :"*[*]",
	  min_height: 600,
	  codesample_languages: [
			{text: 'HTML/XML', value: 'markup'},
			{text: 'JavaScript', value: 'javascript'},
			{text: 'CSS', value: 'css'},
			{text: 'PHP', value: 'php'},
			{text: 'Ruby', value: 'ruby'},
			{text: 'Python', value: 'python'},
			{text: 'Java', value: 'java'},
			{text: 'C', value: 'c'},
			{text: 'C#', value: 'csharp'},
			{text: 'C++', value: 'cpp'}
		],
	  toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code | codesample',
    
	});

	tinymce.remove('textarea.richTextBox[name="custom_footer_code"]');
	tinymce.init({
	  selector: 'textarea.richTextBox[name="custom_footer_code"]',
	  menubar: false,
	  plugins: 'codesample',
	  extended_valid_elements :"script[src|async|defer|type|charset]",
	  codesample_languages: [
			{text: 'HTML/XML', value: 'markup'},
		],
	  toolbar: 'codesample',
    
	});

	tinymce.remove('textarea.richTextBox[name="custom_header_code"]');
	tinymce.init({
	  selector: 'textarea.richTextBox[name="custom_header_code"]',
	  menubar: false,
	  plugins: 'codesample',
	  extended_valid_elements :"script[src|async|defer|type|charset]",
	  codesample_languages: [
			{text: 'HTML/XML', value: 'markup'},
		],
	  toolbar: 'codesample',
    
	});

	//update tinymce for site.custom_header_code
	tinymce.remove('textarea.richTextBox[name="site.custom_header_code"]');
	tinymce.init({
	  selector: 'textarea.richTextBox[name="site.custom_header_code"]',
	  menubar: false,
	  plugins: 'codesample',
	  extended_valid_elements :"script[src|async|defer|type|charset]",
	  codesample_languages: [
			{text: 'HTML/XML', value: 'markup'},
		],
	  toolbar: 'codesample',
    
	});
	//update tinymce for site.custom_footer_code
	tinymce.remove('textarea.richTextBox[name="site.custom_footer_code"]');
	tinymce.init({
	  selector: 'textarea.richTextBox[name="site.custom_footer_code"]',
	  menubar: false,
	  plugins: 'codesample',
	  extended_valid_elements :"script[src|async|defer|type|charset]",
	  codesample_languages: [
			{text: 'HTML/XML', value: 'markup'},
		],
	  toolbar: 'codesample',
    
	});

	//update tinymce for admin.custom_header_code
	tinymce.remove('textarea.richTextBox[name="admin.custom_header_code"]');
	tinymce.init({
	  selector: 'textarea.richTextBox[name="admin.custom_header_code"]',
	  menubar: false,
	  plugins: 'codesample',
	  extended_valid_elements :"script[src|async|defer|type|charset]",
	  codesample_languages: [
			{text: 'HTML/XML', value: 'markup'},
		],
	  toolbar: 'codesample',
    
	});
	//update tinymce for admin.custom_footer_code
	tinymce.remove('textarea.richTextBox[name="admin.custom_footer_code"]');
	tinymce.init({
	  selector: 'textarea.richTextBox[name="admin.custom_footer_code"]',
	  menubar: false,
	  plugins: 'codesample',
	  extended_valid_elements :"script[src|async|defer|type|charset]",
	  codesample_languages: [
			{text: 'HTML/XML', value: 'markup'},
		],
	  toolbar: 'codesample',
    
	});

	//update tinymce for site.custom_section
	tinymce.remove('textarea.richTextBox[name="site.custom_section"]');
	 tinymce.init({
	  selector: 'textarea.richTextBox[name="site.custom_section"]',
	  plugins: 'codesample,link, image, code, table, textcolor, lists',
	  extended_valid_elements :"*[*]",
	  min_height: 600,
	  codesample_languages: [
			{text: 'HTML/XML', value: 'markup'},
			{text: 'JavaScript', value: 'javascript'},
			{text: 'CSS', value: 'css'},
			{text: 'PHP', value: 'php'},
			{text: 'Ruby', value: 'ruby'},
			{text: 'Python', value: 'python'},
			{text: 'Java', value: 'java'},
			{text: 'C', value: 'c'},
			{text: 'C#', value: 'csharp'},
			{text: 'C++', value: 'cpp'}
		],
	  toolbar: 'styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code | codesample',
    
	});

}