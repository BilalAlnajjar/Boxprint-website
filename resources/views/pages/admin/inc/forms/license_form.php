<div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create / Edite Consultant</h3>
        </div>
            <div class="card-body">
            
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-header">
                                <h3 class="card-title">Create Consultant</h3>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputname">License Name</label>
                                    <input type="text" class="form-control" id="exampleInputname" placeholder="Enter License Name">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Document Needed</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                        <select multiple="multiple" class="hide-select">
                                            <option value="1">Design Field 1</option>
                                            <option value="2">Design Field 2</option>
                                            <option value="3">Design Field 3</option>
                                            <option value="4">Design Field 4</option>
                                        </select>
                                        </div>
                                        <div class="col-md-1">
                                        <a href="#" class="btn btn-primary click-add" data-box="documentNeeded">ADD</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Old Drawing Needed</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                        <select multiple="multiple" class="hide-select">
                                            <option value="1">Design Field 1</option>
                                            <option value="2">Design Field 2</option>
                                            <option value="3">Design Field 3</option>
                                            <option value="4">Design Field 4</option>
                                        </select>
                                        </div>
                                        <div class="col-md-1">
                                        <a href="#" class="btn btn-primary click-add" data-box="oldDrawingNeeded">ADD</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Design Needed</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                        <select multiple="multiple" class="hide-select">
                                            <option value="1">Design Field 1</option>
                                            <option value="2">Design Field 2</option>
                                            <option value="3">Design Field 3</option>
                                            <option value="4">Design Field 4</option>
                                        </select>
                                        </div>
                                        <div class="col-md-1">
                                        <a href="#" class="btn btn-primary click-add" data-box="documentNeeded">ADD</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            </div>
                            

                            </div>
                            <div class="card toggle-custom" id="documentNeeded">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Document</h3>
                                    </div>

                            
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Document Needed</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Add Item">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary " type="button" >ADD</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card toggle-custom" id="oldDrawingNeeded">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Old Drawing</h3>
                                    </div>

                            
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Old Drawing Needed</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Add Item">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary" type="button">ADD</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" id="designNeeded" class="toggle-custom">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Needed</h3>
                                    </div>

                            
                                    <div class="col-lg-12 ">
                                        <div class="form-group field_wrapper">
                                            <label>Document Needed</label>
                                            <div class="row">
                                                <div class="col-md-11">
                                                <input type="text" class="form-control" placeholder="Enter your documents needed" name="field_name[]" value="" />
                                                </div>
                                                <div class="col-md-1">
                                                <a href="javascript:void(0)" class="btn btn-primary add_button" title="Add field">ADD</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" id="designNeeded" class="toggle-custom">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="card-title">Add Design</h3>
                                    </div>

                            
                                    <div class="col-lg-12 ">
                                        <div class="form-group field_wrapper">
                                            <label>Design Needed</label>
                                            <div class="row">
                                                <div class="col-md-11">
                                                <input type="text" class="form-control" placeholder="Enter your design needed" name="field_name[]" value="" />
                                                </div>
                                                <div class="col-md-1">
                                                <a href="javascript:void(0)" class="btn btn-primary add_button" title="Add field">ADD</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" id="designNeeded" class="toggle-custom">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3 class="card-title">Add old Drawing</h3>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <div class="form-group field_wrapper">
                                            <label>Design Needed</label>
                                            <div class="row">
                                                <div class="col-md-11">
                                                <input type="text" class="form-control" placeholder="Enter your old drawing" name="field_name[]" value="" />
                                                </div>
                                                <div class="col-md-1">
                                                <a href="javascript:void(0)" class="btn btn-primary add_button" title="Add field">ADD</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Licens Recorded</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                        <select multiple="multiple" class="hide-select">
                                            <option value="1">Licens 1</option>
                                            <option value="2">Licens 2</option>
                                            <option value="3">Licens 3</option>
                                            <option value="4">Licens 4</option>
                                        </select>
                                        </div>
                                        <div class="col-md-1">
                                        <a href="#" class="btn btn-primary click-add" data-box="documentNeeded">Check</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>

            
            <div class="card-footer">
                <a href="#" class="btn btn-success mt-1">Save</a>
                <a href="#" class="btn btn-danger mt-1">Cancel</a>
            </div>
        </div>

        <input type="hidden" id="up-click">
    </div>							
