<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
tbody tr {
  cursor: move;
}
  </style>

<!------ Include the above in your HEAD tag ---------->
<head>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
</head>
    
<section>
<form action="{{ route('preference-store') }}" method="POST" class="mt-6 space-y-6">
    @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nursing-colleges">College Of Nursing</label>
                    <select class="custom-select mr-sm-2" name="nursing_colleges" required>
                        <option value="CON GANGARAM HOSPITAL, LAHORE" >{{ __('CON GANGARAM HOSPITAL, LAHORE') }}</option>
                        <option value="CON MAYO HOSPITAL, LAHORE" >{{ __('CON MAYO HOSPITAL, LAHORE') }}</option>
                        <option value="CON AMC, LGH, LAHORE" >{{ __('CON AMC, LGH, LAHORE') }}</option>
                        <option value="CON KHUSHAB" >{{ __('CON KHUSHAB') }}</option>
                        <option value="CON VEHARI" >{{ __('CON VEHARI') }}</option>
                        <option value="CON CHAKWAL" >{{ __('CON CHAKWAL') }}</option>
                        <option value="CON KASSUR'" >{{ __('CON KASSUR') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex items-end gap-4">
            <a href="{{route('dashboard')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Previous') }}
            </a>
            <x-primary-button>{{ __('Save Preference') }}</x-primary-button>
        </div>
    </form>

    <header>
        <h2 class="text-lg font-medium text-gray-900" style="color: black !important;">
       Preference List
        </h2>
    </header>

    <div class="row">
        <div class="col-12">
            <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Sr.#</th>
                    <th>College of Nursing</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($userPrefences))
                    @foreach($userPrefences as $userPrefence)
                        <tr>
                            <td class="index">{{$loop->iteration}}</td>
                            <td>{{$userPrefence->nursing_colleges ?? '-----'}}</td>
                        </tr>
                    @endforeach
                @endif
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    
</section>


<script>
		var fixHelperModified = function(e, tr) {
		var $originals = tr.children();
		var $helper = tr.clone();
		$helper.children().each(function(index) {
			$(this).width($originals.eq(index).width())
		});
		return $helper;
	},
		updateIndex = function(e, ui) {
			$('td.index', ui.item.parent()).each(function (i) {
				$(this).html(i+1);
			});
			$('input[type=text]', ui.item.parent()).each(function (i) {
				$(this).val(i + 1);
			});
		};

	$("#myTable tbody").sortable({
		helper: fixHelperModified,
		stop: updateIndex
	}).disableSelection();
	
		$("tbody").sortable({
		distance: 5,
		delay: 100,
		opacity: 0.6,
		cursor: 'move',
		update: function() {}
			});

</script>