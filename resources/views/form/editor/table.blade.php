<div class="btn-group editor-table" role="group">

    <button type="button" class="btn dropdown-toggle editor-dropdown-table" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="@lang('bs-component::editor.table.table')" title="@lang('bs-component::editor.table.table')">
      <svg class="editor-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z">
      </svg>
    </button>

    <div class="dropdown-menu p-0" >

      <div class="btn-group">

        <button type="button" class="btn editor-btn-table" value="create" aria-label="@lang('bs-component::editor.table.create')" title="@lang('bs-component::editor.table.create')">
          <svg class="editor-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
          </svg>
        </button>
        <button type="button" class="btn editor-btn-table d-none" value="delete" aria-label="@lang('bs-component::editor.table.delete')" title="@lang('bs-component::editor.table.delete')">
          <svg class="editor-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"></path>
          </svg>
        </button>
        <button type="button" class="btn editor-btn-table" value="col-before" aria-label="@lang('bs-component::editor.table.col-left')" title="@lang('bs-component::editor.table.col-left')">
          <svg class="editor-icon" xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <g>
            	<path d="M14,0H2C0.9,0,0,1,0,2.3v11.4C0,15,0.9,16,2,16h12c1.1,0,2-1,2-2.3V2.3C16,1,15.1,0,14,0z M11,14.9H2c-0.6,0-1-0.5-1-1.1
            		V2.3c0-0.7,0.4-1.1,1-1.1h9V14.9z M15,13.7c0,0.7-0.4,1.1-1,1.1h-2V1.1h2c0.6,0,1,0.5,1,1.1V13.7z"></path>
            	<path d="M2.7,8.4h2.8v3c0,0.3,0.2,0.5,0.5,0.5s0.5-0.2,0.5-0.5V8.5h2.9c0.3,0,0.5-0.2,0.5-0.5S9.7,7.5,9.4,7.5H6.5V4.6
            		c0-0.3-0.2-0.5-0.5-0.5S5.5,4.3,5.6,4.5v2.9H2.7c-0.3,0-0.5,0.2-0.5,0.5C2.2,8.2,2.4,8.4,2.7,8.4z"></path>
            </g>
          </svg>
        </button>
        <button type="button" class="btn editor-btn-table" value="col-after" aria-label="@lang('bs-component::editor.table.col-right')" title="@lang('bs-component::editor.table.col-right')">
          <svg class="editor-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <g>
            	<path d="M2,16h12c1.1,0,2-1,2-2.3V2.3C16,1,15.1,0,14,0H2C0.9,0,0,1,0,2.3v11.4C0,15,0.9,16,2,16z M5,1.1h9c0.6,0,1,0.5,1,1.1v11.4
            		c0,0.7-0.4,1.1-1,1.1H5V1.1z M1,2.3c0-0.7,0.4-1.1,1-1.1h2v13.7H2c-0.6,0-1-0.5-1-1.1V2.3z"></path>
            	<path d="M13.3,7.6h-2.8v-3c0-0.3-0.2-0.5-0.5-0.5S9.5,4.3,9.5,4.6v2.9H6.6C6.3,7.5,6.1,7.7,6.1,8s0.2,0.5,0.5,0.5h2.9v2.9
            		c0,0.3,0.2,0.5,0.5,0.5s0.5-0.2,0.4-0.4V8.6h2.9c0.3,0,0.5-0.2,0.5-0.5C13.8,7.8,13.6,7.6,13.3,7.6z"></path>
            </g>
          </svg>
        </button>
        <button type="button" class="btn editor-btn-table" value="col-delete" aria-label="@lang('bs-component::editor.table.col-delete')" title="@lang('bs-component::editor.table.col-delete')">
          <svg class="editor-icon"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <g>
            	<path d="M5.5,8c0-0.3,0.2-0.5,0.5-0.5h4c0.3,0,0.5,0.2,0.5,0.5S10.3,8.5,10,8.5H6C5.7,8.5,5.5,8.3,5.5,8z"></path>
            	<path d="M2,2c0-1.1,0.9-2,2-2h8c1.1,0,2,0.9,2,2v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V2z M12,1H4C3.4,1,3,1.4,3,2v12
            		c0,0.6,0.4,1,1,1h8c0.6,0,1-0.4,1-1V2C13,1.4,12.6,1,12,1z"></path>
            </g>
          </svg>
        </button>
        <button type="button" class="btn editor-btn-table" value="row-above" aria-label="@lang('bs-component::editor.table.row-above')" title="@lang('bs-component::editor.table.row-above')">
          <svg class="editor-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <g>
            	<path d="M16,14V2c0-1.1-1-2-2.3-2H2.3C1,0,0,0.9,0,2v12c0,1.1,1,2,2.3,2h11.4C15,16,16,15.1,16,14z M1.1,11V2c0-0.6,0.5-1,1.1-1
            		h11.4c0.7,0,1.1,0.4,1.1,1v9H1.1z M2.3,15c-0.7,0-1.1-0.4-1.1-1v-2h13.7v2c0,0.6-0.5,1-1.1,1H2.3z"></path>
            	<path d="M7.6,2.7v2.8h-3C4.3,5.5,4.1,5.7,4.1,6s0.2,0.5,0.5,0.5h2.9v2.9c0,0.3,0.2,0.5,0.5,0.5s0.5-0.2,0.5-0.5V6.5h2.9
            		c0.3,0,0.5-0.2,0.5-0.5s-0.2-0.5-0.4-0.4H8.6V2.7c0-0.3-0.2-0.5-0.5-0.5C7.8,2.2,7.6,2.4,7.6,2.7z"></path>
            </g>
          </svg>
        </button>
        <button type="button" class="btn editor-btn-table" value="row-below" aria-label="@lang('bs-component::editor.table.row-below')" title="@lang('bs-component::editor.table.row-below')">
          <svg class="editor-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <g>
            	<path d="M0,2v12c0,1.1,1,2,2.3,2h11.4c1.3,0,2.3-0.9,2.3-2V2c0-1.1-1-2-2.3-2H2.3C1,0,0,0.9,0,2z M14.9,5v9c0,0.6-0.5,1-1.1,1H2.3
            		c-0.7,0-1.1-0.4-1.1-1V5H14.9z M13.7,1c0.7,0,1.1,0.4,1.1,1v2H1.1V2c0-0.6,0.5-1,1.1-1H13.7z"></path>
            	<path d="M8.4,13.3v-2.8h3c0.3,0,0.5-0.2,0.5-0.5s-0.2-0.5-0.5-0.5H8.5V6.6c0-0.3-0.2-0.5-0.5-0.5S7.5,6.3,7.5,6.6v2.9H4.6
            		c-0.3,0-0.5,0.2-0.5,0.5s0.2,0.5,0.4,0.4h2.9v2.9c0,0.3,0.2,0.5,0.5,0.5C8.2,13.8,8.4,13.6,8.4,13.3z"></path>
            </g>
          </svg>
        </button>
        <button type="button" class="btn editor-btn-table" value="row-delete" aria-label="@lang('bs-component::editor.table.row-delete')" title="@lang('bs-component::editor.table.row-delete')">
          <svg class="editor-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <g>
            	<path d="M5.5,8c0-0.3,0.2-0.5,0.5-0.5h4c0.3,0,0.5,0.2,0.5,0.5S10.3,8.5,10,8.5H6C5.7,8.5,5.5,8.3,5.5,8z"></path>
            	<path d="M14,2c1.1,0,2,0.9,2,2v8c0,1.1-0.9,2-2,2H2c-1.1,0-2-0.9-2-2V4c0-1.1,0.9-2,2-2H14z M15,12V4c0-0.6-0.4-1-1-1H2
            		C1.4,3,1,3.4,1,4v8c0,0.6,0.4,1,1,1h12C14.6,13,15,12.6,15,12z"></path>
            </g>
          </svg>
        </button>
        
      </div>

    </div>
</div>
