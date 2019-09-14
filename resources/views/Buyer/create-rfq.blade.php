<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flowers Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('/')}}/assets/css/custom.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<body class="bg-gray">
  <div class="wrapper">
    <header class="main-header bg-white">
      <nav class="navbar navbar-expand-sm top-bar-nav">
        <div class="container">
          <ul class="navbar-nav">
            <li><a href="#">Company Name</a></li>
          </ul>
        </div><!-- container -->
      </nav>
    </header>

    <main class="main-sec">
      <section class="common-sec">
        <div class="container">
          <div class="form-sec bg-white p-5">
            <h2>Data Form</h2>

          <form method="post" action="{{url('/create-rfq')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Buyer Name</label>
                  <input type="text" class="form-control" name="" value="{{$user_detail->name}}" readonly id="">
                  </div>
                </div><!-- col -->
{{-- {{dd($user_detail)}} --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="number" class="form-control"  value="{{$user_detail->UserDetail->phone_number}}"  name="phone_number" id="">
                  </div>
                  @if ($errors->has('phone_number'))
                  <span class="error text-danger">{{ $errors->first('phone_number') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label>RFQ for</label>
                    <select class="form-control" name="rfq_for" id="">
                      <option value=''> Please Select</option>
                      @foreach(StaticArray::$rfq_for as $key => $value)
                      <option value="{{$key}}">{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                  @if ($errors->has('rfq_for'))
                  <span class="error text-danger">{{ $errors->first('rfq_for') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label>RFQ Name</label>
                    <input type="text" class="form-control" name="state" id="">
                  </div>
                  @if ($errors->has('state'))
                  <span class="error text-danger">{{ $errors->first('state') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Our Project Ref</label>
                    <input type="text" class="form-control" name="project_ref" id="">
                  </div>
                  @if ($errors->has('project_ref'))
                  <span class="error text-danger">{{ $errors->first('project_ref') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Currency</label>
                    <input type="text" class="form-control" name="currency" id="">
                  </div>
                  @if ($errors->has('currency'))
                  <span class="error text-danger">{{ $errors->first('currency') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label>FOB Point</label>
                    <input type="text" class="form-control" name="fob_point" id="">
                  </div>
                  @if ($errors->has('fob_point'))
                  <span class="error text-danger">{{ $errors->first('fob_point') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Freight Quote</label>
                    <input type="text" class="form-control" name="freight_quote" id="">
                  </div>
                  @if ($errors->has('freight_quote'))
                  <span class="error text-danger">{{ $errors->first('freight_quote') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Publish Date</label>
                    <input type="date" class="form-control" name="publish_date" id="">
                  </div>
                  @if ($errors->has('publish_date'))
                  <span class="error text-danger">{{ $errors->first('publish_date') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Closing Date/Time</label>
                    <input type="date" class="form-control" name="closing_date" id="">
                  </div>
                  @if ($errors->has('closing_date'))
                  <span class="error text-danger">{{ $errors->first('closing_date') }}</span>
                  @endif
                </div><!-- col -->
              
              </div><!-- row -->

              <h4 class="mt-5">Add More Fields</h4>
              <div class="table-sec mb-5">
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Stock #</th>
                      <th>Location</th>
                      <th>Name </th>
                      <th> Description</th>
                      <th>Part Number</th>
                      <th>Qty Required</th>
                      <th colspan="2">Unit</th>
                    </tr>
                  </thead>
                  <tbody class="add-tr-body">
                    <tr>
                      <td>
                        <span><input type="text" class="form-control" name="item[]" id=""></span>
                      </td>
                      <td>
                        <span><input type="text" class="form-control" name="stock[]" id=""></span>
                      </td>
                      <td>
                        <span><input type="text" class="form-control" name="location[]" id=""></span>
                      </td>
                      <td>
                        <span><input type="text" class="form-control" name="item_name[]" id=""></span>
                      </td>
                      <td>
                        <span><input type="text" class="form-control" name="item_description[]" id=""></span>
                      </td>
                      <td>
                        <span><input type="text" class="form-control" name="part_no[]" id=""></span>
                      </td>
                      <td>
                        <span><input type="text" class="form-control" name="qty_required[]" id=""></span>
                      </td>
                      <td>
                        <span><input type="text" class="form-control" name="unit[]" id=""></span>
                      </td>
                      <td>
                        <span class="cross-td"><i class="fa fa-times" aria-hidden="true"></i></span>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="8">
                        <a href="javascript:void(0);" class="add-row-td common-btn small-btn">Add More</a>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div><!-- table-sec -->

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Remarks to Vendor</label>
                    <textarea class="form-control" name="vendor_remarks" id="" rows="3"></textarea>
                  </div>
                  @if ($errors->has('vendor_remarks'))
                  <span class="error text-danger">{{ $errors->first('vendor_remarks') }}</span>
                  @endif
                </div><!-- col -->
              </div><!-- row -->

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Buyer's Attachment/Specification/Etc</label>
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose your file</label>
                      </div>
                    </div>
                  </div>
                  @if ($errors->has('file'))
                  <span class="error text-danger">{{ $errors->first('file') }}</span>
                  @endif
                </div><!-- col -->
              </div><!-- row -->

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Terms of Supply or Services</label>
                    <select class="form-control" name="terms" id="">
                      <option value='' >-Select-</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  @if ($errors->has('terms'))
                  <span class="error text-danger">{{ $errors->first('terms') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Invite Vendors</label>
                    <input type="email" class="form-control" name="vendor_email" id="">
                  </div>
                  @if ($errors->has('vendor_email'))
                  <span class="error text-danger">{{ $errors->first('vendor_email') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Post RFQ to Public?</label>
                    <select value="" class="form-control" name="is_public" id="">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                  </div>
                  @if ($errors->has('is_public'))
                  <span class="error text-danger">{{ $errors->first('is_public') }}</span>
                  @endif
                </div><!-- col -->
              </div><!-- row -->

              <h4 class="mt-5">Approving Authority and Evaluation Analysis</h4>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Approving Authority</label>
                    <input type="text" class="form-control" name="approving_authority" id="">
                  </div>
                  @if ($errors->has('approving_authority'))
                  <span class="error text-danger">{{ $errors->first('approving_authority') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-4">
                  <div class="form-group">
                    <label>RFQ Criteria</label>
                    <input type="text" class="form-control" name="rfq_criteria" id="">
                  </div>
                  @if ($errors->has('rfq_criteria'))
                  <span class="error text-danger">{{ $errors->first('rfq_criteria') }}</span>
                  @endif
                </div><!-- col -->

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Scoring Mathalogy </label>
                    <input type="text" class="form-control" name="scoring_mathalogy" id="">
                  </div>
                  @if ($errors->has('scoring_mathalogy'))
                  <span class="error text-danger">{{ $errors->first('scoring_mathalogy') }}</span>
                  @endif
                </div><!-- col -->
              </div><!-- row -->

              <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Is Flexible </label>
                  <input type="checkbox" class="form-control" name="is_flexible" id="">
                </div>
              </div><!-- col -->
            </div><!-- row -->

              <div class="submit">
                <button type="submit" class="common-btn">Submit</button>
              </div><!-- submit -->

            </form>
          </div><!-- form-sec -->
        </div><!-- container -->
      </section><!-- common-sec -->
    </main>

    <footer class="main-footer bg-white">
      <div class="container">
        <div class="text-center">@ Copyright 2019</div>
      </div><!-- container -->
    </footer><!-- main-footer -->
  </div><!-- wrapper -->

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="{{url('/')}}/assets/js/custom.js"></script>
</body>
</html>
