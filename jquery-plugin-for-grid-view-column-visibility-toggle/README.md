## Purpose

In Yii 2.0 Framework, the gridview, which is used to display data in tabular format, may have number of columns, causing a responsive site to distort the page structure. With this plugin, it is possible to toggle the visibility of the columns so that on smaller devices, the maximum number of visible columns can be reduced as per convinience.

## Requirements

It is a jQuery plugin. To start with, wrap the gridview in a div with class **column-toggle-container**. Include another div with class **has-column-toggle** within **column-toggle-container** where the toggle button will appear. After jQuery is loaded, call the function **toggleGridViewColumns** on the gridview

For eg.:
$('#grid-view').toggleGridViewColumns({
	excludeColumns: ['column4', 'column5', ...],
	excludeActionColumn: false,
	activeColumns: ['column1', 'column2', 'column3', ...]
});

## Options
Currently it takes three options:
**excludeColumns**: the column titles which are not supposed to be shown in the dropdown to toggle columns. Default : [].
**excludeActionColumn**: whether to exclude the action button column of the gridview or not. Default: true.
**activeColumns**: which columns to show already selected, these must be columns which are by default shown from the server. Default: []
