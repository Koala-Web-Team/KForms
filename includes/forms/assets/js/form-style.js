/*
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
*/

/*let sheet = (function() {
    let styles = document.getElementsByTagName('link'),
        style = document.createElement("style");
    style.appendChild(document.createTextNode(""));
    for (let i = 0; i < styles.length; i += 1){
        if (styles[i].href.split('/').includes('form-style.css') === true){
            styles[i].parentNode.insertBefore(style, styles[i].nextSibling);
        }
    }
    return style.sheet;
})();*/
class DefaultForm{
    koalaInputs = document.querySelectorAll('.koala-form input');
    textareaField = document.querySelectorAll('.koala-form textarea');
    koalaFieldset = document.querySelectorAll('.koala-form fieldset');
    koalaLegend = document.querySelectorAll('.koala-form fieldset legend');
    addFirstIndex(ele,classname){
            let eleClassList= ele.classList,
                arr = [...eleClassList];
            arr.splice(0, 0, classname);
            ele.classList.remove(...eleClassList);
            for ( let j = 0; j < arr.length; j += 1 ){
               ele.classList.add(arr[j]);
            }
        }
    inputsDefault(){
        for (let i = 0; i < this.koalaInputs.length; i += 1) {
            if (this.koalaInputs[i].getAttribute('type') === 'text' ||
                this.koalaInputs[i].getAttribute('type') === 'email' ||
                this.koalaInputs[i].getAttribute('type') === 'password' ||
                this.koalaInputs[i].getAttribute('type') === 'tel' ||
                this.koalaInputs[i].getAttribute('type') === 'url'
            ){
                this.addFirstIndex(this.koalaInputs[i], "koala-input-field");
            } else if (this.koalaInputs[i].getAttribute('type') === 'search'){
                this.addFirstIndex(this.koalaInputs[i], "koala-search-field");
            } else if ( this.koalaInputs[i].getAttribute('type') === 'button' ||
                this.koalaInputs[i].getAttribute('type') === 'reset' ||
                this.koalaInputs[i].getAttribute('type') === 'submit' ){
                this.addFirstIndex(this.koalaInputs[i], "koala-input-button");
            } else if (this.koalaInputs[i].getAttribute('type') === 'color'){
                this.addFirstIndex(this.koalaInputs[i], "koala-input-color");
            } else if (this.koalaInputs[i].getAttribute('type') === 'range'){
                this.addFirstIndex(this.koalaInputs[i], "koala-input-range");
            }else if (this.koalaInputs[i].getAttribute('type') === 'date'
                || this.koalaInputs[i].getAttribute('type') === 'datetime-local'
                || this.koalaInputs[i].getAttribute('type') === 'month'
                || this.koalaInputs[i].getAttribute('type') === 'week'){
                if (navigator.userAgent.indexOf("Firefox") !== -1){
                    this.addFirstIndex(this.koalaInputs[i], "koala-type-date");
                }else {
                    this.addFirstIndex(this.koalaInputs[i], "koala-input-date");
                }
            }else if (this.koalaInputs[i].getAttribute('type') === 'time'){
                if (navigator.userAgent.indexOf("Firefox") !== -1){
                    this.addFirstIndex(this.koalaInputs[i], "koala-type-time");
                }else {
                    this.addFirstIndex(this.koalaInputs[i], "koala-input-time");
                }
            }else if (this.koalaInputs[i].getAttribute('type') === 'file'){
                this.addFirstIndex(this.koalaInputs[i], "koala-input-file");
            }
            else if (this.koalaInputs[i].getAttribute('type') === 'number'){
                this.addFirstIndex(this.koalaInputs[i], "koala-input-number");
            }
        }
    }
    textareaDefault(){
        for (let i = 0; i < this.textareaField.length; i += 1){
            this.addFirstIndex(this.koalaInputs[i], "koala-textarea-field");
        }
    }
    fieldsetDefault(){
        for (let i = 0; i < this.koalaFieldset.length; i += 1){
            this.addFirstIndex(this.koalaInputs[i], "koala-fieldset");
        }
        for (let i = 0; i < this.koalaLegend.length; i += 1){
             this.addFirstIndex(this.koalaInputs[i], "koala-legend");
        }
    }
    allDefaults(){
        this.inputsDefault();
        this.textareaDefault();
        this.fieldsetDefault()
    }
}
class customFile{
    koalaFormFile = document.querySelectorAll('.koala-form .custom-input-file');
    customFileInput = document.querySelectorAll(".koala-form .custom-file");
    customFileCreate(){
        for ( let i = 0; i < this.koalaFormFile.length; i += 1 ){
            let customFileDiv = document.createElement('div'),
                customFileButton = document.createElement('div'),
                customFileSelected = document.createElement('div'),
                fileButton = document.createElement('button'),
                filesSelected = document.createElement('span'),
                buttonText = document.createTextNode("Choose File"),
                buttonTextArabic = document.createTextNode("أختر ملف"),
                spanTextArabic = document.createTextNode("لا يوجد ملفات"),
                spanText = document.createTextNode("No file chosen");
            customFileDiv.appendChild(customFileButton);
            customFileDiv.appendChild(customFileSelected);
            customFileButton.appendChild(fileButton);
            customFileSelected.appendChild(filesSelected);
            if(document.dir === "rtl"){
                fileButton.appendChild(buttonTextArabic);
                filesSelected.appendChild(spanTextArabic);
            }
            else{
                fileButton.appendChild(buttonText);
                filesSelected.appendChild(spanText);
            }
            customFileDiv.setAttribute("class" ,"custom-file");
            customFileButton.setAttribute("class", "custom-file-button");
            customFileSelected.setAttribute("class","custom-file-selected");
            this.koalaFormFile[i].parentElement.insertBefore(customFileDiv,this.koalaFormFile[i].nextElementSibling);
        }
    }
    fileClick(){
        for ( let i = 0; i <= this.customFileInput.length; i += 1){
            let fileInput = this.customFileInput[i].previousElementSibling,
                fileButton = this.customFileInput[i].querySelector('.custom-file-button'),
                fileSpan = this.customFileInput[i].querySelector('.custom-file-selected');
            fileButton.onclick = function(e){
                e.preventDefault();
            }
            this.customFileInput[i].addEventListener('click', function(event){
                if ( event.target.tagName === 'BUTTON'|| event.target.tagName === 'SPAN'
                    || event.target.tagName === 'DIV'){
                    fileInput.click();
                    fileInput.oninput = function( ){
                        if ( this.files.length > 1){
                            if ( document.dir === "rtl" ){
                                fileSpan.innerHTML = fileInput.files.length + " ملفات";
                            }
                            else {
                                fileSpan.innerHTML = fileInput.files.length + " files";
                            }
                        }
                        else {
                            fileSpan.innerHTML = fileInput.files[0].name;
                        }
                    }
                }

            })
        }
    }
    applyFunctions (){
        this.customFileCreate();
        this.fileClick();
    }
}
function floatLabel(){
    let floatLabelInput = document.querySelectorAll('.koala-float-label input'),
        floatLabelInsetInput = document.querySelectorAll('.koala-float-label-inset input');
    function actionFloatLabel(floatInput){
        for ( let i = 0; i < floatInput.length; i+=1 ){
            floatInput[i].onfocus = function(){
                this.nextElementSibling.classList.add('float-focused');
                if ( this.nextElementSibling.classList.contains('float-valid-blur')){
                    this.oninput = function( ){
                        console.log(this.value);
                        if ( this.value.length === 0){
                            this.nextElementSibling.classList.remove('float-valid-blur');
                        }
                    }
                }
            }
            floatInput[i].onblur = function( ){
                if (this.value.trim() !== ""){
                    this.nextElementSibling.classList.remove('float-focused');
                    this.nextElementSibling.classList.add('float-valid-blur');
                }
                else {
                    this.nextElementSibling.classList.remove('float-focused');
                }
            }
        }
    }
    actionFloatLabel(floatLabelInput);
    actionFloatLabel(floatLabelInsetInput);
}
function showHidePassword(){
    let showInput = document.getElementsByClassName('show-password-option'),
        showAction = document.getElementsByClassName('show-password-action');
    for ( let i = 0; i < showAction.length; i += 1 ){
        showAction[i].onclick = function(){
            for ( let j = 0; j < showInput.length; j += 1 ){
                if ( showInput[j].getAttribute('type') === 'password'){
                    showInput[j].setAttribute('type', 'text');
                }
                else {
                    showInput[j].setAttribute('type', 'password');
                }
            }
        }
    }
}
function customNumber(){
    let minus = document.querySelectorAll(".minus"),
        plus = document.querySelectorAll(".plus");
    function stepDown(e) {
        e.preventDefault();
        this.parentNode.querySelector('input[type=number]').stepDown();
    }
    function stepUp(e) {
        e.preventDefault();
        this.parentNode.querySelector('input[type=number]').stepUp();
    }
    for ( let i = 0; i < minus.length; i += 1){
        minus[i].addEventListener("click", stepDown);
        plus[i].addEventListener("click", stepUp);
    }

}
function customRange(){
    let color, popupRange, rangePopup, labelRange, rangeLabel,
        popupRanges=document.querySelectorAll(".koala-input-range-popup"),
        labelRanges=document.querySelectorAll(".koala-input-range-label");
    for (let i = 0; i < popupRanges.length; i++) {
        popupRange=popupRanges[i];
        rangePopup=popupRange.nextElementSibling;
    }
    for (let i = 0; i < labelRanges.length; i++) {
        labelRange=labelRanges[i];
        rangeLabel=labelRange.nextElementSibling;
    }
    function setValue (){
        const
            newValue = Number( (popupRange.value - popupRange.min) * 100 / (popupRange.max - popupRange.min) ),
            newPosition = 10 - (newValue * 0.165),
            labelNewValue = Number( (labelRange.value - labelRange.min) * 100 / (labelRange.max - labelRange.min) );
        if (rangePopup){
            rangePopup.innerHTML = `<span>${newValue}</span>`;
            rangePopup.style.left = `calc(${newValue}% + (${newPosition}px))`;
            if (newValue<100/3)
                color='red'
            else if(newValue>100/3*2)
                color='green'
            else
                color='#007BFF'
            popupRange.style.background = 'linear-gradient(to right, '+color+' ' + newValue + '%, #dee2e6 ' + newValue + '%)'
        }
        if (rangeLabel){
            rangeLabel.innerHTML = `${labelNewValue}`;
            if (labelNewValue < 100/3)
                color='red'
            else if(labelNewValue>100/3*2)
                color='green'
            else
                color='#007BFF'
            labelRange.style.background = 'linear-gradient(to right, '+color+' ' + labelNewValue + '%, #dee2e6 ' + labelNewValue + '%)'
        }

    };
    document.addEventListener("DOMContentLoaded", setValue);
    popupRange.addEventListener('input', setValue);
    labelRange.addEventListener('input', setValue);

    let thumbSize = 17;

    function draw(slider,splitValue) {

        /* set function vars */
        let min = slider.querySelector('.min'),
            max = slider.querySelector('.max'),
            lower = slider.querySelector('.lower'),
            upper = slider.querySelector('.upper'),
            thumbSize = parseInt(slider.getAttribute('data-thumbSize')),
            rangeWidth = parseInt(slider.getAttribute('data-rangeWidth')),
            rangeMin = parseInt(slider.getAttribute('data-rangeMin')),
            rangeMax = parseInt(slider.getAttribute('data-rangeMax'));

        /* set min and max attributes */
        min.setAttribute('max',splitValue);
        max.setAttribute('min',splitValue);

        /* set css */
        min.style.width = parseInt(thumbSize + ((splitValue - rangeMin)/(rangeMax - rangeMin))*(rangeWidth - (2*thumbSize))) + 'px';
        max.style.width = parseInt(thumbSize + ((rangeMax - splitValue)/(rangeMax - rangeMin))*(rangeWidth - (2*thumbSize)))+'px';
        min.style.left = '0px';
        max.style.left = parseInt(min.style.width)+'px';

        /* correct for 1 off at the end */
        if(max.value>(rangeMax - 1)) max.setAttribute('data-value',rangeMax);

        /* write value and labels */
        max.value = max.getAttribute('data-value');
        min.value = min.getAttribute('data-value');
        lower.innerHTML = min.getAttribute('data-value');
        upper.innerHTML = max.getAttribute('data-value');

    }

    let sliders = document.querySelectorAll('.min-max-slider');
    sliders.forEach( function(slider) {
        init(slider);
    });

    function init(slider) {
        /* set function vars */
        let min = slider.querySelector('.min'),
            max = slider.querySelector('.max'),
            rangeMin = parseInt(min.getAttribute('min')),
            rangeMax = parseInt(max.getAttribute('max')),
            avgValue = (rangeMin + rangeMax)/2;

        /* set data-values */
        min.setAttribute('data-value',rangeMin);
        max.setAttribute('data-value',rangeMax);

        /* set data vars */
        slider.setAttribute('data-rangeMin',rangeMin);
        slider.setAttribute('data-rangeMax',rangeMax);
        slider.setAttribute('data-thumbSize',thumbSize);
        slider.setAttribute('data-rangeWidth',slider.offsetWidth);

        /* write labels */
        let labels = document.createElement('span'),
            lower = document.createElement('span'),
            upper = document.createElement('span');
        lower.classList.add('lower','value');
        upper.classList.add('upper','value');
        labels.classList.add('labelsContainer')
        lower.appendChild(document.createTextNode(rangeMin));
        upper.appendChild(document.createTextNode(rangeMax));
        labels.appendChild(lower);
        labels.appendChild(upper);
        slider.insertBefore(labels,min.previousElementSibling);
        /* draw */
        draw(slider,avgValue);

        /* events */
        min.addEventListener("input", function() {update(min);});
        max.addEventListener("input", function() {update(max);});
    }

    function update(el){
        /* set function vars */
        let slider = el.parentElement,
            min = slider.querySelector('#min'),
            max = slider.querySelector('#max'),
            minvalue = Math.floor(min.value),
            maxvalue = Math.floor(max.value);

        /* set inactive values before draw */
        min.setAttribute('data-value',minvalue);
        max.setAttribute('data-value',maxvalue);

        let avgValue = (minvalue + maxvalue)/2;
        /* draw */
        draw(slider,avgValue);
    }

}
function customComboBox(){
    [].forEach.call(document.getElementsByClassName('search-box'), function (el) {

        const combo = document.querySelector('.customComboBox'),
            optionsContainer = document.querySelector('.options-container'),
            searchBox = document.querySelector('.search-box input'),
            optionsList = document.querySelectorAll('.option');

        combo.addEventListener('click', () => {
            optionsContainer.classList.toggle('active');
            combo.classList.toggle('activated');
            searchBox.value = '';
            filterList('');
        });

        optionsList.forEach(o => {
            o.addEventListener('click', () => {
                addTag(o.innerHTML);
                o.classList.add('hidden');
            });
        });

        searchBox.addEventListener('keyup', function (e) {
            filterList(e.target.value);
        });

        const filterList = searchTerm => {
            searchTerm = searchTerm.toLowerCase();
            optionsList.forEach(option => {
                let label = option.innerText.toLowerCase();
                if (label.indexOf(searchTerm) !== -1) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
        };

        document.addEventListener('click', function (event) {
            let isClickInside = combo.contains(event.target);
            if (!isClickInside) {
                optionsContainer.classList.remove('active');
                combo.classList.remove('activated');
            }
        });

        let hiddenInput = document.createElement('input'),
            tags = [];
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', el.getAttribute('data-name'));
        el.appendChild(hiddenInput);

        function addTag(text) {
            let tag = {
                text: text,
                element: document.createElement('span'),
            };

            tag.element.classList.add('tag');
            tag.element.textContent = tag.text;

            let closeBtn = document.createElement('span');
            closeBtn.classList.add('close');
            closeBtn.addEventListener('click', function () {
                removeTag(tags.indexOf(tag));
            });
            tag.element.appendChild(closeBtn);
            if (!objectPropInArray(tags, 'text', tag.text)) {
                tags.push(tag);
                el.insertBefore(tag.element, searchBox);
            }
            refreshTags();
        }

        function removeTag(index) {
            let tag = tags[index];
            tags.splice(index, 1);
            el.removeChild(tag.element);
            refreshTags();
        }

        function refreshTags() {
            let tagsList = [];
            tags.forEach(function (t) {
                tagsList.push(t.text);
            });
            hiddenInput.value = tagsList.join(',');
        }

        function objectPropInArray(list, prop, val) {
            if (list.length > 0) {
                for (let i in list) {
                    if (list[i][prop] === val) {
                        return true;
                    }
                }
            }
            return false;
        }
    })
}
function customDate(){
    const
        selected_date_element = document.querySelector('.date-picker .selected-date'),
        calendar =document.querySelector('.date-picker .calendar'),
        mth_element = document.querySelector('.calendar .date-header .mth'),
        year_element = document.querySelector('.calendar .date-header .year'),
        next_mth_element = document.querySelector('.calendar .date-header .next-mth'),
        prev_mth_element = document.querySelector('.calendar .date-header .prev-mth'),
        days_Headers = document.querySelector('.calendar .daysLabels'),
        days_element = document.querySelector('.calendar .days'),
        today_button = document.querySelector('#today'),
        month_menu = document.querySelector('.months_menu'),
        year_menu = document.querySelector('.years_menu');

    const
        months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        daysLabels = ['Sat', 'Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri'];

    let date = new Date();
    let day = date.getDate();
    let month = date.getMonth();
    let year = date.getFullYear();

    let selectedDate = date;
    let selectedDay = day;
    let selectedMonth = month;
    let selectedYear = year;

    mth_element.textContent = months[month];
    year_element.textContent =  year;

    selected_date_element.textContent = formatDate(date);
    selected_date_element.dataset.value = selectedDate;


    for (let i = 0; i < 7; i++) {
        const dayHeader = document.createElement('span');
        dayHeader.innerHTML=daysLabels[i];
        days_Headers.appendChild(dayHeader);
    }
    for (let i = 0; i < months.length; i++) {
        const monthButton = document.createElement('button');
        monthButton.textContent=months[i];
        monthButton.value=i.toString();
        monthButton.addEventListener('click',selectMonth);
        month_menu.appendChild(monthButton);
    }
    for (let i = 1900; i <= 2034; i++) {
        const yearButton = document.createElement('button');
        yearButton.innerHTML=i.toString();
        yearButton.addEventListener('click',selectYear);
        year_menu.appendChild(yearButton);
    }

    function getDayCount (year, month) {
        return 32 - new Date(year, month, 32).getDate();
    }
    function getDayName (year, month, day) {
        let selectedDate = new Date(year, month-1, day);
        return selectedDate.toLocaleDateString('en-US',{weekday: 'long'});
    }

    populateDates();

// EVENT LISTENERS
    selected_date_element.addEventListener('click', toggleDatePicker);
    next_mth_element.addEventListener('click', goToNextMonth);
    prev_mth_element.addEventListener('click', goToPrevMonth);
    today_button.addEventListener('click',setDateToday);
    mth_element.addEventListener('click',toggleMonthSelect);
    year_element.addEventListener('click',toggleYearSelect);

// FUNCTIONS
    function toggleDatePicker () {
        calendar.classList.toggle('active');
    }
    function toggleMonthSelect(){
        month_menu.classList.toggle('active');
        year_menu.classList.remove('active')
    }
    function toggleYearSelect(){
        year_menu.classList.toggle('active');
        month_menu.classList.remove('active');
    }
    function goToNextMonth () {
        month++;
        if (month > 11) {
            month = 0;
            year++;
        }
        mth_element.textContent = months[month];
        year_element.textContent =  year;
        month_menu.classList.remove('active');
        year_menu.classList.remove('active');
        populateDates();
    }

    function goToPrevMonth () {
        month--;
        if (month < 0) {
            month = 11;
            year--;
        }
        mth_element.textContent = months[month];
        year_element.textContent =  year;
        month_menu.classList.remove('active');
        year_menu.classList.remove('active');
        populateDates();
    }

    function populateDates () {
        days_element.innerHTML = '';
        for (let i = 0; i < getEmptyFieldsCount(year,month); i++){
            const emptySpace = document.createElement('span');
            days_element.appendChild(emptySpace);
        }
        for (let i = 0; i < getDayCount(year,month); i++) {
            const day_element = document.createElement('button');
            day_element.classList.add('day');
            day_element.textContent = (i + 1).toString();
            day_element.classList.remove('selected');
            if (selectedDay === (i + 1)) {
                day_element.classList.add('selected');
                selectedDate = new Date(year + '-' + (month + 1) + '-' + (i + 1));
                selectedDay = (i + 1);
                selectedMonth = month;
                selectedYear = year;
                selected_date_element.textContent = formatDate(selectedDate);
                selected_date_element.dataset.value = selectedDate;
            }

            day_element.addEventListener('click', function () {
                selectedDate = new Date(year + '-' + (month + 1) + '-' + (i + 1));
                selectedDay = (i + 1);
                selectedMonth = month;
                selectedYear = year;

                selected_date_element.textContent = formatDate(selectedDate);
                selected_date_element.dataset.value = selectedDate;
                calendar.classList.remove('active')

                populateDates();
            });

            days_element.appendChild(day_element);
        }
        function getEmptyFieldsCount (year,month) {
            let emptyFieldsCount = 0;
            switch(getDayName(year, month+1, 1))
            {
                case "Sunday":
                    emptyFieldsCount = 1;
                    break;
                case "Monday":
                    emptyFieldsCount = 2;
                    break;
                case "Tuesday":
                    emptyFieldsCount = 3;
                    break;
                case "Wednesday":
                    emptyFieldsCount = 4;
                    break;
                case "Thursday":
                    emptyFieldsCount = 5;
                    break;
                case "Friday":
                    emptyFieldsCount = 6;
                    break;
            }
            return emptyFieldsCount;
        }
    }
    function formatDate (d) {
        let day = d.getDate();
        if (day < 10) {
            day = '0' + day;
        }

        let month = d.getMonth() + 1;
        if (month < 10) {
            month = '0' + month;
        }

        let year = d.getFullYear();

        return day + ' / ' + month + ' / ' + year;
    }
    function setDateToday(){
        let today = new Date();
        selectedDay=today.getDate();
        selectedMonth=today.getMonth();
        selectedYear=today.getFullYear();
        day=today.getDate();
        month=today.getMonth();
        year=today.getFullYear();
        console.log(today.getMonth());
        mth_element.textContent = months[month];
        year_element.textContent =  year;
        selected_date_element.textContent = formatDate(date);
        selected_date_element.dataset.value = selectedDate;
        populateDates();
        calendar.classList.remove('active')
    }
    function selectMonth(e){
        e.preventDefault();
        selectedMonth=parseInt(e.target.value);
        month=parseInt(e.target.value);
        mth_element.textContent = months[month];
        selected_date_element.textContent = formatDate(date);
        selected_date_element.dataset.value = selectedDate;
        toggleMonthSelect();
        populateDates();
    }
    function selectYear(e){
        e.preventDefault();
        selectedYear=e.target.innerText;
        year=e.target.innerText;
        year_element.textContent = year;
        selected_date_element.textContent = formatDate(date);
        selected_date_element.dataset.value = selectedDate;
        toggleYearSelect();
        populateDates();
    }
    document.addEventListener('mouseup', function(e) {
        if (!calendar.contains(e.target)) {
            calendar.classList.remove('active');
        }
    });
}
function customMonth(){
    const
        selected_date_element = document.querySelector('.date-picker-month .selected-date'),
        calendar =document.querySelector('.date-picker-month .calendar'),
        year_element = document.querySelector('.calendar .date-header .year'),
        next_year_element = document.querySelector('.calendar .date-header .next-mth'),
        prev_year_element = document.querySelector('.calendar .date-header .prev-mth'),
        month_menu = document.querySelector('.months_menu'),
        year_menu = document.querySelector('.years_menu'),
        ok = document.querySelector('#ok');

    const
        months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    let date = new Date();
    let month = date.getMonth();
    let year = date.getFullYear();

    let selectedDate = date;
    let selectedMonth = month;
    let selectedYear = year;

    year_element.textContent =  year;

    selected_date_element.textContent = formatDate(date);
    selected_date_element.dataset.value = selectedDate;

    for (let i = 0; i < months.length; i++) {
        const monthButton = document.createElement('button');
        monthButton.textContent=months[i];
        monthButton.value=i.toString();
        monthButton.addEventListener('click',selectMonth);
        month_menu.appendChild(monthButton);
    }
    for (let i = 1900; i <= 2034; i++) {
        const yearButton = document.createElement('button');
        yearButton.innerHTML=i.toString();
        yearButton.addEventListener('click',selectYear);
        year_menu.appendChild(yearButton);
    }

//Event Listeners
    selected_date_element.addEventListener('click', toggleDatePicker);
    next_year_element.addEventListener('click', goToNextYear);
    prev_year_element.addEventListener('click', goToPrevYear);
    year_element.addEventListener('click',toggleYearSelect);
    ok.addEventListener('click',toggleDatePicker)

// FUNCTIONS
    function toggleDatePicker () {
        calendar.classList.toggle('active');
    }

    function toggleYearSelect(){
        year_menu.classList.toggle('active');
    }
    function goToNextYear () {
        year++;
        year_element.textContent =  year;
        year_menu.classList.remove('active');
        refresh();
    }

    function goToPrevYear () {
        year--;
        year_element.textContent =  year;
        year_menu.classList.remove('active');
        refresh();
    }
    function refresh() {
        selectedDate = new Date(year + '-' + (month + 1));
        selectedMonth = month;
        selectedYear = year;
        selected_date_element.textContent = formatDate(selectedDate);
        selected_date_element.dataset.value = selectedDate;
    }

    function formatDate (d) {
        let month = d.getMonth();
        let year = d.getFullYear();

        return months[month] + ' , ' + year;
    }
    function selectMonth(e){
        e.preventDefault();
        selectedMonth=parseInt(e.target.value);
        month=parseInt(e.target.value);
        selected_date_element.textContent = formatDate(date);
        selected_date_element.dataset.value = selectedDate;
        refresh();
    }
    function selectYear(e){
        e.preventDefault();
        selectedYear=e.target.innerText;
        year=e.target.innerText;
        year_element.textContent = year;
        selected_date_element.textContent = formatDate(date);
        selected_date_element.dataset.value = selectedDate;
        toggleYearSelect();
        refresh();
    }
    document.addEventListener('mouseup', function(e) {
        if (!calendar.contains(e.target)) {
            calendar.classList.remove('active');
        }
    });
}
let defaultKoalaForm = new DefaultForm(),
    fileObject = new customFile();
defaultKoalaForm.allDefaults();
floatLabel();
customDate();
//customMonth();
showHidePassword();
customNumber();
customRange();
customComboBox();
fileObject.applyFunctions();
