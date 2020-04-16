# Installation

Install the package via composer:

```
composer require nh/bs-component
```

# Form Components

All the component manage the request old() value and the validation.

## Input

```
<x-bs-input type="text" label="My label" name="fieldname" value="Default value" placeholder="My placeholder" help="Help message" size="lg" readonly disabled required />
```

## Textarea

```
<x-bs-textarea label="My label" name="fieldname" value="Default value" placeholder="My placeholder" help="Help message" readonly disabled required />
```

## Checks

```
<x-bs-check type="checkbox" label="My label" name="fieldname" value="Default value" help="Help message" disabled checked />
```

## Checks List

```
<x-bs-checklist type="checkbox" label="My label" name="fieldname[]" :options="[1 => 'one', 2 => 'two']" help="Help message" :checked="[2]" disabled required />
```

## Select

```
<x-bs-select label="My label" name="fieldname" :options="[1 => 'one', 2 => 'two']" help="Help message" size="lg" :selected="[2]" multiple disabled required />
```
