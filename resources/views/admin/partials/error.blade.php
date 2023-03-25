@if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <i class="ti-alert"></i>
                                @foreach ($errors->all() as $error)
                                    <li> <h4>{{ $error }}</h4></li>
                                @endforeach
                            </div>
                        @endif