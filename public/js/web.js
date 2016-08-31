var EditorHtml = function () {
    var name;
    var editorsmall;
    EditorHtml.prototype.Name = function (value) {
        this.name = value;
    };
    EditorHtml.prototype.EditorSmall = function (value) {
        if (value == true || value == false) {
            this.editorsmall = value;
        } else {
            this.editorsmall = false;
        }
    }
    EditorHtml.prototype.Render = function (value) {
        if (value != undefined) {
            this.name = value;
        }
        if (this.editorsmall == true) {
            var editor = CKEDITOR.replace(this.name, {
                toolbar: 'Custom',
                toolbar_Custom: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                    { name: 'styles', items: ['Styles', 'Format'] },
                    { name: 'basicstyles', items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat'] },
                    { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight'] },                    
                    { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
                    { name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
                    { name: 'tools', items: ['Maximize', '-', 'About'] }
                ]
            });
        } else {
            var editor = CKEDITOR.replace(this.name);
        }
        CKFinder.setupCKEditor(editor, '/ckeditor/ckfinder/');
    }
};

var SimpleTabs  = function() {
    SimpleTabs.prototype.Show = function(name) {
        $(name).click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
    }
};

function DivFadeOut(div) {
    $(div).fadeOut(5000);
}
function OnSuccessRemove(data) {
    if (data && data.Status) {
        window.location.reload(true);
    } else {
        if (data && data.Status == false) {
            alert("Atenção: \r\nExistem dados que não deixam esse registro ser excluido");
        }
    }
}
function Remove(id) {
    $("#messageDelete").html('Exclusão definitiva');
    $("#excluirId").val(id);
    $("#deleteModal").modal('show');
}

function ValidateCPF(cpf) {  
    cpf = cpf.replace(/[^\d]+/g,'');    
    if(cpf == '') return false; 
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;       
    // Valida 1o digito 
    add = 0;    
    for (i=0; i < 9; i ++)       
        add += parseInt(cpf.charAt(i)) * (10 - i);  
        rev = 11 - (add % 11);  
        if (rev == 10 || rev == 11)     
            rev = 0;    
        if (rev != parseInt(cpf.charAt(9)))     
            return false;       
    // Valida 2o digito 
    add = 0;    
    for (i = 0; i < 10; i ++)        
        add += parseInt(cpf.charAt(i)) * (11 - i);  
    rev = 11 - (add % 11);  
    if (rev == 10 || rev == 11) 
        rev = 0;    
    if (rev != parseInt(cpf.charAt(10)))
        return false;       
    return true;   
}