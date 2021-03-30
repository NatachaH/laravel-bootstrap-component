# Installation

Install the package via composer:

```
composer require nh/bs-component
```

Add this to your packages.json

```
"@popperjs/core": "^2.6.0",
"bootstrap" : "^5.0.0-beta3",
"quill" : "^1.3.6",
"flatpickr" : "^4.6.7"
```

Publish the config

```
php artisan vendor:publish --tag=bs-component
```

Javascript to include

```
require('../../vendor/nh/bs-component/resources/js/bs-component');
```

SASS to include

```
@import '../../vendor/nh/bs-component/resources/sass/bs-component';
```

Available components:

- [X] Alert
- [X] Blockquote
- [X] Breadcrumb
- [X] Card
- [X] Figure
- [X] Loading (Spinner)
- [X] Modal
- [X] Modal Confirm
- [X] Progress
- [X] Toast
- [X] Check (checkbox, radio or switch)
- [X] Checklist (list of checkbox or radio)
- [X] Datepicker
- [X] Dynamic input
- [X] Editor
- [X] Input
- [X] Input file
- [X] Select
- [X] Datalist
- [X] Textarea

Available JS:

- [X] Datepicker (Flatpickr)
- [X] Editor (QuillJS)
- [X] Checkbox all
- [X] Toggle switch
- [X] Autocomplete

# Components

## Alert

| Attribute | Type | Default |
| --------- | ---- | ------- |
| color     | string | primary |           
| closable | boolean | false |

```
<x-bs-alert color="success" closable>
  Hey this is an alert !
</x-bs-alert>
```

## Blockquote

| Attribute | Type | Default |
| --------- | ---- | ------- |
| source    | string | null  |           
| align     | string | start  |

```
<x-bs-blockquote source="Natacha Herth" align="right">
  Hey this a blockquote !
</x-bs-blockquote>
```

## Breadcrumb

| Attribute | Type | Default |
| --------- | ---- | ------- |
| items     | array | null   |           

*The keys in array are used to display the link text and the values are used for the href. The values can be an url or a route name.*

```
<x-bs-breadcrumb :items="['First' => 'home', 'Seconde' => '#','Third' => null,'Fourth' => '#']"/>
```

## Card

| Attribute | Type | Default |
| --------- | ---- | ------- |
| title     | string | null  |
| footer    | string | null  |           

*The title and the footer can also be set as slot.*

```
<x-bs-card title="My card title" footer="My card footer">

  <x-slot name="before">
    Before the card body.
  </x-slot>

  Hey this a card !

  <x-slot name="after">
    After the card body.
  </x-slot>

</x-bs-card>
```

## Figure

| Attribute | Type | Default |
| --------- | ---- | ------- |
| caption   | string | null  |
| align     | string | start  |           

*The align is for the caption.*

```
<x-bs-figure caption="My caption" align="right">
  <img src="https://fakeimg.pl/250x100/cccccc/">
</x-bs-figure>
```

## Loading

| Attribute | Type | Default |
| --------- | ---- | ------- |
| type      | string | border |
| color     | string | primary |   
| title     | string | Loading... |    
| size      | string | md |           

*The default title is the 'bs-component::button.loading' translation.*

```
<x-bs-loading type="grow" color="success" title="Custom loading text" size="sm"/>
```

## Modal

| Attribute | Type | Default |
| --------- | ---- | ------- |
| title     | string | null  |
| footer    | string | null  |   
| size      | string | md    |   
| closable  | boolean | false |
| centered  | boolean | false |  
| scrollable | boolean | false |    
| is-static | boolean | false |
| fullscreen | boolean | false |      
| fullscreen-size | string | null |

```
<x-bs-modal id="myModal" title="My modal" footer="The footer of the modal" size="sm" closable centered  scrollable is-static fullscreen fullscreen-size="md">
  Hey this a modal !
</x-bs-modal>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Launch modal
</button>
```

You can load by axios the content of the modal:

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_modal-load');```

```
<x-bs-modal id="myModalLoad" class="modal-load"></x-bs-modal>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalLoad" data-action="my-url-where-to-load">
  Launch modal
</button>
```


## Modal Confirm

| Attribute | Type | Default |
| --------- | ---- | ------- |
| color     | string | primary |
| icon      | string | null  |
| title     | string | null  |
| action    | string | #     |
| method    | string | POST  |
| footer    | string | null  |   
| size      | string | md    |   
| centered  | boolean | false |  
| scrollable | boolean | false |    
| fullscreen | boolean | false |      
| fullscreen-size | string | null |
| with-file | boolean | false |      
| btn-cancel | array | [] |
| btn-confirm | array | [] |

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_modal-confirm');```
- SASS: ```@import '../../vendor/nh/bs-component/resources/sass/modal-confirm';```

*The action can be overide by the data-action attribute in the link*

```
<x-bs-modal-confirm id="myModalConfirm" color="danger" icon="icon-trash" title="My modal confirm" action="default.action" method="DELETE" size="md" centered >
  <p>Hey this a modal for confirmation !</p>
</x-bs-modal>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModalConfirm" data-action="custom.action">
  Launch modal confirm
</button>
```

## Customization

You can globaly customize the buttons in the 'bs-component' config file.
Or you can set an array with the custom values (class,label,value) for each button.

```
<x-bs-modal-confirm :btnConfirm="['class' => 'btn-success','label' => 'my.translation.path','value' => '<i class=icon-checkmark></i>']">
  Hey this a modal for confirmation !
</x-bs-modal>
```

## Progress

| Attribute | Type | Default |
| --------- | ---- | ------- |
| color     | string | primary |
| value     | int  | 0       |   
| min       | int  | 0       |   
| max       | int  | 0       |   
| caption   | string | null  |
| stripped  | boolean | false |
| animated  | boolean | false |

```
<x-bs-progress color="success" value="25" min="0" max="100" caption="You got 25" stripped animated/>
```

## Toast

| Attribute | Type | Default |
| --------- | ---- | ------- |
| title     | string | null |
| time      | string | null |
| img       | string | null |
| closable  | boolean | false |
| autohide  | boolean | false |
| delay     | int    | 10000 |

```
<x-bs-toast class="show" title="My toast" time="11 min ago" img="https://fakeimg.pl/20x20/007bff/fff" closable autohide delay="100">
  Hey this is a toast !
</x-bs-toast>

<x-bs-toast class="show" time="11 min ago" img="https://fakeimg.pl/20x20/007bff/fff" closable autohide delay="100">
  Hey this is a toast !
</x-bs-toast>
```

# Form Components

All the component manage the request old() value and the validation.

Here the default attributes:

| Attribute    | Type    | Default|
| ------------ | ------- | ------ |
| label        | string  | null   |
| name         | string  | null   |
| value        | string  | null   |
| help         | string  | null   |
| required     | boolean | false  |
| disabled     | boolean | false  |
| readonly     | boolean | false  |
| before       | string  | null   |
| after        | string  | null   |
| errorRelated | string  | null   |
| errorBag     | string  | null   |


## Check

| Attribute | Type    | Default  |
| --------- | ------- | -------- |
| type      | string  | checkbox |
| value     | string  | 1        |
| checked   | boolean | false    |
| boolean   | boolean | false    |

*If the boolean option is set to true, a hidden input with the value opposite value is created.*

```
<x-bs-check label="Boolean checkbox" type="checkbox" name="boolean" boolean required/>
<x-bs-check class="form-switch" label="Boolean switch" type="checkbox" name="switch" boolean />

<x-bs-check label="My check one" type="checkbox" name="checkbox[]" value="one" help="Help message." checked />
<x-bs-check label="My check two" type="checkbox" name="checkbox[]" value="two"/>
<x-bs-check label="My check three" type="checkbox" name="checkbox[]" value="three" disabled />

<x-bs-check label="My radio one" type="radio" name="radio" value="one" help="Help message." checked />
<x-bs-check label="My radio two" type="radio" name="radio" value="two" />
<x-bs-check label="My radio three" type="radio" name="radio" value="three" help="Help message." disabled />
```

## CheckList

| Attribute | Type    | Default  | Option         |
| --------- | ------- | -------- | -------------- |
| disabled  | mixed   | false    | boolean/array  |
| type      | string  | checkbox | checkbox/radio |
| options   | array   | []       |                |
| checked   | mixed   | []       | string/array   |
| inline    | boolean | false    |                |

```
<x-bs-check-list label="My label" type="checkbox" name="checkbox_list[]" :options="[1 => 'one', 2 => 'two', 3 => 'three']" help="Help message" :checked="[2]" :disabled="[3]" required />
<x-bs-check-list label="My label" type="radio" name="radio_list[]" :options="[1 => 'one', 2 => 'two', 3 => 'three']" help="Help message" :checked="[2]" :disabled="[3]" required />

<x-bs-check-list label="My label" type="checkbox" name="checkbox_list_inline[]" :options="[1 => 'one', 2 => 'two', 3 => 'three']" help="Help message" inline />
<x-bs-check-list label="My label" type="radio" name="radio_list_inline[]" :options="[1 => 'one', 2 => 'two', 3 => 'three']" help="Help message" inline />
```

## Input

| Attribute | Type     | Default  | Option         |
| --------- | -------- | -------- | -------------- |
| type      | string   | text     | text/number/phone/email/password |
| placeholder | string | null     |                |
| size      | string   | null     |                |
| step      | float    | 1        |                |
| min       | float    | null     |                |
| max       | float    | null     |                |


*The step, min and max are only for input of type number.*

```
<x-bs-input label="My input" type="text" name="myinput" value="Default value" placeholder="My placeholder" help="Help message" size="lg" readonly disabled required />

<x-bs-input label="My input" type="text" name="myinput" before="A" after="B" />
```


## Input File

| Attribute | Type    | Default |
| --------- | ------- | ------- |
| size      | string  | null    |
| multiple  | boolean | false   |

```
<x-bs-input-file label="My input file" name="myinput" help="Help message" />
<x-bs-input-file label="My input file multiple" name="myinput" help="Help message" multiple/>
<x-bs-input-file label="My input file" name="myinput" help="Help message" size="lg" disabled required />

<x-bs-input-file label="My input file" name="myinput" before="A" after="B" />
```

## Select

| Attribute | Type    | Default  | Option         |
| --------- | ------- | -------- | -------------- |
| disabled  | mixed   | false    | boolean/array  |
| readonly  | boolean | false    |                |
| options   | array   | []       |                |
| size      | string  | null     |                |
| selected  | mixed   | []       | string/array   |
| multiple  | boolean | false    |                |


*You can pass a multi-level array for make optgroup: 'Label' => [1 => 'Name']*
*If the select is readonly, the value(s) will be set in hidden field(s)*

```
<x-bs-select label="My label" name="myinput" :options="[1 => 'one', 2 => 'two']" help="Help message" size="lg" :selected="[2]" multiple disabled required />

<x-bs-select label="My label" name="myinput" :options="[1 => 'one', 2 => 'two']" before="A" after="B" />
```

## Datalist

| Attribute   | Type    | Default |
| ----------- | ------- | ------- |
| placeholder | string  | null    |
| options     | array   | []      |
| size        | string  | null    |
| with-hidden | boolean | false   |
| hidden-name | string  | id      |
| hidden-field | string | null    |

*You can add an hidden input with custom name and value. To activate the functionality you have to add the class .datalist.*
*You can transform a datalist to an autocomplete: Check the JS section for more information*

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_datalist');```

```
<x-bs-datalist label="My label" name="myinput" value="Default value" placeholder="My placeholder" :options="[1 => 'one', 2 => 'two']" help="Help message" size="lg" readonly disabled required />

<x-bs-datalist label="My label" name="myinput" :options="[1 => 'one', 2 => 'two']" before="A" after="B" />

<x-bs-datalist class="datalist" label="My label" name="myinput" :options="[1 => 'one', 2 => 'two']" value="one" with-hidden hidden-name="hiddenid" hidden-value="1" />
```

## Textarea

| Attribute | Type | Default |
| --------- | ---- | ------- |
| placeholder | string | null  |

```
<x-bs-textarea label="My label" name="mytextarea" value="Default value" placeholder="My placeholder" help="Help message" readonly disabled required />

<x-bs-textarea label="My label" name="mytextarea" before="A" after="B" />
```

# JS Component

## Datepicker

To use the datepicker you need to install the JS plugin **Flatpickr** !

| Attribute   | Type   | Default  | Option         |
| ----------- | ------ | -------- | -------------- |
| placeholder | string | null     |                |
| size        | string | null     |                |
| mode        | string | single   | single/multiple/range |
| format      | string | datetime | datetime/datetime-short/date/time/time-short/db-datetime/db-date/db-time |
| min         | string | null     | can be a date or the name of an input |
| max         | string | null     | can be a date or the name of an input |
| inline      | boolean | false   |  |
| input-from  | string | null     |  |
| input-to    | string | null     |  |
| disabled-dates | array | []  |  |
| events      | array  | []  |  |

*You can set a min/max date or define by another input name.*
*For range you can add 2 hidden input to set the from/to values*
*You can set the disabled dates with an array, exemple ['2021-01-05','2021-05-11']*
*You can set some events dates with an array, exemple ['2021-01-05' => ['color' => 'danger'] ,'2021-05-11' => ['color' => 'warning']]*

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_datepicker');```
- SASS: ```@import '../../vendor/nh/bs-component/resources/sass/datepicker';```

```
<x-bs-datepicker class="datepicker-automatic" label="Start date" name="startInputName" value="2020-05-04" placeholder="Select a date" help="Help message" size="lg" readonly disabled required mode="single" format="datetime" min="2020-05-01" max="2020-05-30"/>

<x-bs-datepicker class="datepicker-automatic" label="End date" name="endInputName" mode="single" format="datetime" min="startInputName" />

<x-bs-datepicker class="datepicker-automatic" label="End date" name="range" mode="range" format="datetime" input-from="start_at" input-to="end_at"/>
```

## Dynamic

With this component you can add/remove input to add multiple field in your form !

| Attribute | Type | Default |
| --------- | ---- | ------- |
| legend    | string |       |
| listing   | string | null  |
| template  | string | null  |
| min       | int  | null    |
| max       | int  | null    |
| name      | string | dynamic |
| type      | string | dynamic |
| sortable  | boolean | false |
| items     | array | []     |
| defaults  | array | []     |
| itemsDisabled | array | []     |
| help      | string | null  |
| btnConfig | string | bs-component.dynamic.buttons |
| before    | string | null |
| after     | string | null |

*The legend is required.*
*The listing and template are path to some includes views.*
*The Drag&Drop is NOT initialize, you have to add the JS for that functionnality*

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_dynamic');```
- SASS: ```@import '../../vendor/nh/bs-component/resources/sass/dynamic';```

```
<x-bs-dynamic class="dynamic-automatic" legend="My dynamic field" listing="default.view.listing" template="default.view.template" min="1" max="5" name="mydynamic" type="mytype" sortable :items="[]" help="Help message" />
```

In the template view you have access to the **$default**;
In the listing view you have acces to the **$item**

###Customization:

You can globaly customize the buttons in the 'bs-component' config file or you can specify a custom config file/array to use.

```
<x-bs-dynamic class="dynamic-automatic" legend="My custom dynamic" btnConfig="my.custom.config.file"/>
```

## Editor

To use the editor you need to install the JS plugin **QuillJS** !

| Attribute | Type    | Default |
| --------- | ------- | ------- |
| label     | string  | null    |
| name      | string  | null    |
| value     | string  | null    |
| help      | string  | null    |
| required  | boolean | false   |
| toolbar   | string  | header&#124;format&#124;list&#124;link&#124;color |
| colors    | string  | primary&#124;success&#124;warning&#124;danger |
| headers   | string  | 1&#124;2&#124;3 |
| error     | string  | null   |
| errorBag  | string  | null   |

*The name is required.*

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_editor');```
- SASS: ```@import '../../vendor/nh/bs-component/resources/sass/editor';```

```
<x-bs-editor label="My editor" name="editor" value="Default text" help="Help message" required toolbar="color" colors="primary|success" headers="1|2|3|4|5|6"/>
```

## Checkbox all

If you need a checkbox to check all his children:

```
<x-bs-check class="checkbox-all" label="Check them all" name="checkboxAll[]" value="my-children"/>

<x-bs-check class="checkbox-my-children" label="AAA" name="children[]" value="AAA"/>
<x-bs-check class="checkbox-my-children" label="BBB" name="children[]" value="BBB"/>
<x-bs-check class="checkbox-my-children" label="CCC" name="children[]" value="CCC"/>
```

*The parent checkbox need the class checkbox-all and the value xxx*
*The children checkbox need the class checkbox-xxx*

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_checkbox-all');```

## toggle switch

If you need a checkbox to show/hide some classes:

```
<div>
  <x-bs-check class="form-switch toggle-switch" label="Toggle" type="checkbox" name="toggle" value="1" boolean/>

  <div class="toggle-switch-false">
    Display this div if toggle IS NOT checked
  </div>

  <div class="toggle-switch-true">
    Display this div if toggle IS checked
  </div>
</div>
```

*The toggle switch and div to hide/show should be wrap in a parent div*

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_toggle-switch');```

## Autocomplete

If you need an autocomplete datalist:

**Require**
- JS: ```require('../../vendor/nh/bs-component/resources/js/_datalist');```

HTML:

```
<div>
<x-bs-datalist class="mydatalist" label="My autocomplete" name="myinput" :options="[]" with-hidden hidden-name="id" />
<x-bs-input label="Hidden field" name="hiddenField" />
<x-bs-input label="Other field" name="otherField" />
</div>

<datalist id="myCustomDatalist">
</datalist>
```

JS:

| Option | Type | Default | Informations |
| --------- | ------ | ----------------------------- | --- |
| url       | string | el.getAttribute('data-url')   | Url for the axio request (POST) |
| field     | string | el.getAttribute('data-field') | Field to use for the options value and input |
| datalist  | HTML   | el.querySelector('datalist')  | The datalist object |
| hidden.input  | HTML   | el.querySelector('.input-hidden')  | Input hidden to fill when option is selected |
| hidden.field  | string   | el.getAttribute('data-hidden-field')  | Field to use for the hidden input value |
| onChanged | function | function(e){} | Callback function |

*The url must return a JSON list*
*You can set the data-url data-field and data-hidden-field over the js option*


```
var datalists = document.querySelectorAll('.mydatalist');
Array.prototype.forEach.call(datalists, function(el, i) {
    var datalist = new Datalist(el,{
      url: 'myurlstring',
      field: 'name',
      datalist: document.querySelector('#myCustomDatalist'),
      hidden: {
        input: el.parentNode.querySelector('input[name="hiddenField"]'),
        field: 'id'
      },
      onChanged: function(option){
        el.parentNode.querySelector('input[name="otherField"]').value = option ? option.price : '';
      }
    });
});
```

In this exemple the **#myCustomDatalist** datalist options will be contruct via the url request.
Exemple of datas items: { id: 1, name: 'My item', 'price': 10.00}

When the user will select an option, the **Hidden field** will be set with the **id** and the **Other field** will be set with the **price** of the JSON item.
