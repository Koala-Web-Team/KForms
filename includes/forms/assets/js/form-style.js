function prototypeFunctions() {
    Element.prototype.setAttributes = function (attrs) {
        let attr;
        for (attr in attrs) {
            if (attrs.hasOwnProperty(attr)){
                this.setAttribute(attr, attrs[attr]);
            }
        }
    };
}
let sheet = (function() {
    let styles = document.getElementsByTagName('link'),
        style = document.createElement("style");
    style.appendChild(document.createTextNode(""));
    for (let i = 0; i < styles.length; i += 1){
        if (styles[i].href.split('/').includes('form-style.css') === true){
            styles[i].parentNode.insertBefore(style, styles[i].nextSibling);
        }
    }
    return style.sheet;
})();
class DefaultForm{
    koalaInputs = document.querySelectorAll('.koala-form input');
    textareaField = document.querySelectorAll('.koala-form textarea');
    koalaFieldset = document.querySelectorAll('.koala-form fieldset');
    koalaLegend = document.querySelectorAll('.koala-form fieldset legend');
    inputsDefault(){
        for (let i = 0; i < this.koalaInputs.length; i += 1) {
            if (this.koalaInputs[i].getAttribute('type') === 'text' ||
                this.koalaInputs[i].getAttribute('type') === 'email' ||
                this.koalaInputs[i].getAttribute('type') === 'password' ||
                this.koalaInputs[i].getAttribute('type') === 'tel' ||
                this.koalaInputs[i].getAttribute('type') === 'url'
            ){
                this.koalaInputs[i].classList.add('koala-input-field');
            } else if (this.koalaInputs[i].getAttribute('type') === 'search'){
                this.koalaInputs[i].classList.add('koala-search-field');
            } else if ( this.koalaInputs[i].getAttribute('type') === 'button' ||
                this.koalaInputs[i].getAttribute('type') === 'reset' ||
                this.koalaInputs[i].getAttribute('type') === 'submit' ){
                this.koalaInputs[i].classList.add('koala-input-button');
            } else if (this.koalaInputs[i].getAttribute('type') === 'color'){
                this.koalaInputs[i].classList.add('koala-input-color');
            } else if (this.koalaInputs[i].getAttribute('type') === 'range'){
                this.koalaInputs[i].classList.add('koala-input-range');
            }else if (this.koalaInputs[i].getAttribute('type') === 'date'
                || this.koalaInputs[i].getAttribute('type') === 'datetime-local'
                || this.koalaInputs[i].getAttribute('type') === 'month'
                || this.koalaInputs[i].getAttribute('type') === 'week'){
                if (navigator.userAgent.indexOf("Firefox") !== -1){
                    this.koalaInputs[i].classList.add('koala-type-date');
                }else {
                    this.koalaInputs[i].classList.add('koala-input-date');
                }
            }else if (this.koalaInputs[i].getAttribute('type') === 'time'){
                if (navigator.userAgent.indexOf("Firefox") !== -1){
                    this.koalaInputs[i].classList.add('koala-type-time');
                }else {
                    this.koalaInputs[i].classList.add('koala-input-time');
                }
            }else if (this.koalaInputs[i].getAttribute('type') === 'file'){
                this.koalaInputs[i].classList.add('koala-input-file');
            }
            else if (this.koalaInputs[i].getAttribute('type') === 'number'){
                this.koalaInputs[i].classList.add('koala-input-number');
            }
        }
    }
    textareaDefault(){
        for (let i = 0; i < this.textareaField.length; i += 1){
            this.textareaField[i].classList.add('koala-textarea-field');
        }
    }
    fieldsetDefault(){
        for (let i = 0; i < this.koalaFieldset.length; i += 1){
            this.koalaFieldset[i].classList.add('koala-fieldset');
        }
        for (let i = 0; i < this.koalaLegend.length; i += 1){
            this.koalaLegend[i].classList.add('koala-legend');
        }
    }
    allDefaults(){
        this.inputsDefault();
        this.textareaDefault();
        this.fieldsetDefault()
    }
}
window.onload = function () {
    let defaultKoalaForm = new DefaultForm();
    defaultKoalaForm.allDefaults();
    prototypeFunctions();
}