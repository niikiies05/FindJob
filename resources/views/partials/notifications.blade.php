<li class="nav-item dropdown nav-notif">
            <a class="nav-link nav-icon has-badge dropdown-toggle no-caret" onclick="updateReadAt();" href="#" data-toggle="dropdown"
                data-display="static">
                <i class="material-icons">notifications</i>
                <span class="badge badge-pill badge-primary">
                    @auth
                        @php
                            $allNotifications = App\Models\Notification::whereIn('notifiable_type', ['App\Models\User', 'App\Models\Message', 'App\Models\Contact', 'App\Models\Job'])
                            ->orderBy('created_at', 'DESC')->get();
                            // ->where('data->user_id', Auth::user()->id)

                            $countNotifications = App\Models\Notification::whereIn('notifiable_type', ['App\Models\User', 'App\Models\Message', 'App\Models\Contact', 'App\Models\Job'])
                            ->orderBy('created_at', 'DESC')
                            ->whereNull('read_at')->get();
                            // ->where('data->user_id', Auth::user()->id)

                            echo $countNotifications->count();
                        @endphp
                    @endauth
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow border-0 p-0">
                <form>
                    @auth
                        <div class="card border-0">
                            <div class="card-header bg-primary text-white">
                                <i class="material-icons mr-2">notifications</i>

                                {{  $countNotifications->count() }} Notification(s)
                            </div>
                            <div class="card-body p-1 font-size-sm">
                                <div class="list-group list-group-sm list-group-flush">
                                @foreach ($allNotifications as $notificationItem)
                                    @if ($notificationItem->type == 'App\Notifications\AddJob')
                                        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <span class="bg-primary-faded text-primary btn-icon rounded-circle"><i class="fas fa-briefcase"></i></span>
                                                <div class="media-body ml-2">
                                                    Nouvel emploi {{ $notificationItem->data['job_title'] }}
                                                    <div class="small text-muted mt-1 d-flex align-items-center">
                                                        <i class="material-icons mr-1 font-size-sm">access_time</i>
                                                        @if (Carbon\Carbon::now()->diffInDays($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInDays($notificationItem->created_at) }} {{ __('notification.day') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInHours($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInHours($notificationItem->created_at) }} {{ __('notification.hour') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) }} {{ __('notification.minute') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) }} {{ __('notification.second') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) == 0)
                                                            <i>{{ __('notification.now') }}</i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif

                                    @if ($notificationItem->type == 'App\Notifications\AddUser')
                                    <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">
                                        <div class="media">
                                            <span class="bg-warning-faded text-warning btn-icon rounded-circle"><i
                                                    class="material-icons">person</i></span>
                                            <div class="media-body ml-2">
                                                Nouvel utilisateur {{ $notificationItem->data['user_name'] }}
                                                <div class="small text-muted mt-1 d-flex align-items-center">
                                                    <i class="material-icons mr-1 font-size-sm">access_time</i>
                                                    @if (Carbon\Carbon::now()->diffInDays($notificationItem->created_at) >= 1)
                                                        <i>{{ Carbon\Carbon::now()->diffInDays($notificationItem->created_at) }} {{ __('notification.day') }}  {{ __('notification.ago') }}</i>
                                                    @elseif (Carbon\Carbon::now()->diffInHours($notificationItem->created_at) >= 1)
                                                        <i>{{ Carbon\Carbon::now()->diffInHours($notificationItem->created_at) }} {{ __('notification.hour') }}  {{ __('notification.ago') }}</i>
                                                    @elseif (Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) >= 1)
                                                        <i>{{ Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) }} {{ __('notification.minute') }}  {{ __('notification.ago') }}</i>
                                                    @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) >= 1)
                                                        <i>{{ Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) }} {{ __('notification.second') }}  {{ __('notification.ago') }}</i>
                                                    @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) == 0)
                                                        <i>{{ __('notification.now') }}</i>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif

                                @if ($notificationItem->type == 'App\Notifications\AcceptJob')
                                <a href="{{ route('jobs.index') }}" class="list-group-item list-group-item-action">
                                    <div class="media">
                                        <span class="bg-info-faded text-info btn-icon rounded-circle"><i class="fas fa-check"></i></span>
                                        <div class="media-body ml-2">
                                            Ads validated<br>
                                            {{ $notificationItem->data['job_title'] }}
                                            <div class="small text-muted mt-1 d-flex align-items-center">
                                                <i class="material-icons mr-1 font-size-sm">access_time</i>
                                                @if (Carbon\Carbon::now()->diffInDays($notificationItem->created_at) >= 1)
                                                    <i>{{ Carbon\Carbon::now()->diffInDays($notificationItem->created_at) }} {{ __('notification.day') }}  {{ __('notification.ago') }}</i>
                                                @elseif (Carbon\Carbon::now()->diffInHours($notificationItem->created_at) >= 1)
                                                    <i>{{ Carbon\Carbon::now()->diffInHours($notificationItem->created_at) }} {{ __('notification.hour') }}  {{ __('notification.ago') }}</i>
                                                @elseif (Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) >= 1)
                                                    <i>{{ Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) }} {{ __('notification.minute') }}  {{ __('notification.ago') }}</i>
                                                @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) >= 1)
                                                    <i>{{ Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) }} {{ __('notification.second') }}  {{ __('notification.ago') }}</i>
                                                @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) == 0)
                                                    <i>{{ __('notification.now') }}</i>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endif


                                    {{-- @if ($notificationItem->type == 'App\Notifications\SendMessage')
                                        <a href="{{ route('messages.index') }}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <span class="bg-info-faded text-info btn-icon rounded-circle"><i
                                                        class="material-icons">comment</i></span>
                                                <div class="media-body ml-2">
                                                    {{ __('notification.add_message') }}<br>
                                                    {{ $notificationItem->data['message_content'] }}
                                                    <div class="small text-muted mt-1 d-flex align-items-center">
                                                        <i class="material-icons mr-1 font-size-sm">access_time</i>
                                                        @if (Carbon\Carbon::now()->diffInDays($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInDays($notificationItem->created_at) }} {{ __('notification.day') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInHours($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInHours($notificationItem->created_at) }} {{ __('notification.hour') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) }} {{ __('notification.minute') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) }} {{ __('notification.second') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) == 0)
                                                            <i>{{ __('notification.now') }}</i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($notificationItem->type == 'App\Notifications\AddCredit')
                                        <a href="{{ route('credits.index') }}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <span class="bg-success-faded text-success btn-icon rounded-circle"><i
                                                        class="material-icons">shopping_cart</i></span>
                                                <div class="media-body ml-2">
                                                    {{ __('notification.adding_credit') }} <br>
                                                    {{ __('notification.message_credit') }} {{ $notificationItem->data['credit_transaction'] }}
                                                    <div class="small text-muted mt-1 d-flex align-items-center">
                                                        <i class="material-icons mr-1 font-size-sm">access_time</i>
                                                        @if (Carbon\Carbon::now()->diffInDays($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInDays($notificationItem->created_at) }} {{ __('notification.day') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInHours($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInHours($notificationItem->created_at) }} {{ __('notification.hour') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) }} {{ __('notification.minute') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) }} {{ __('notification.second') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) == 0)
                                                            <i>{{ __('notification.now') }}</i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($notificationItem->type == 'App\Notifications\AddCountry')
                                        <a href="{{ route('countries.index') }}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <span class="bg-warning-faded text-warning btn-icon rounded-circle"><i
                                                        class="material-icons">add_circle_outline</i></span>
                                                <div class="media-body ml-2">
                                                {{ __('notification.adding_country') }} {{ $notificationItem->data['country_name'] }}
                                                    <div class="small text-muted mt-1 d-flex align-items-center">
                                                        <i class="material-icons mr-1 font-size-sm">access_time</i>
                                                        @if (Carbon\Carbon::now()->diffInDays($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInDays($notificationItem->created_at) }} {{ __('notification.day') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInHours($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInHours($notificationItem->created_at) }} {{ __('notification.hour') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) }} {{ __('notification.minute') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) }} {{ __('notification.second') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) == 0)
                                                            <i>{{ __('notification.now') }}</i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif --}}
                                    
                                    {{-- @if ($notificationItem->type == 'App\Notifications\AddSalesperson')
                                        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <span class="bg-warning-faded text-warning btn-icon rounded-circle"><i
                                                        class="material-icons">person_add</i></span>
                                                <div class="media-body ml-2">
                                                {{ __('notification.add_sales_person') }} {{ $notificationItem->data['salesperson_name'] }}
                                                    <div class="small text-muted mt-1 d-flex align-items-center">
                                                        <i class="material-icons mr-1 font-size-sm">access_time</i>
                                                        @if (Carbon\Carbon::now()->diffInDays($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInDays($notificationItem->created_at) }} {{ __('notification.day') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInHours($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInHours($notificationItem->created_at) }} {{ __('notification.hour') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) }} {{ __('notification.minute') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) }} {{ __('notification.second') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) == 0)
                                                            <i>{{ __('notification.now') }}</i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                    @if ($notificationItem->type == 'App\Notifications\AddAdmin')
                                        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <span class="bg-warning-faded text-warning btn-icon rounded-circle"><i
                                                        class="material-icons">person_add</i></span>
                                                <div class="media-body ml-2">
                                                {{ __('notification.add_admin') }} {{ $notificationItem->data['admin_name'] }}
                                                    <div class="small text-muted mt-1 d-flex align-items-center">
                                                        <i class="material-icons mr-1 font-size-sm">access_time</i>
                                                        @if (Carbon\Carbon::now()->diffInDays($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInDays($notificationItem->created_at) }} {{ __('notification.day') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInHours($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInHours($notificationItem->created_at) }} {{ __('notification.hour') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) }} {{ __('notification.minute') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) }} {{ __('notification.second') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) == 0)
                                                            <i>{{ __('notification.now') }}</i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif --}}
                                    {{-- @if ($notificationItem->type == 'App\Notifications\CheckCredit')
                                        <a href="{{ route('credits.index') }}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <span class="bg-success-faded text-success btn-icon rounded-circle"><i
                                                        class="material-icons">shopping_cart</i></span>
                                                <div class="media-body ml-2">
                                                    {{ __('notification.no_credit') }} <br>
                                                    {{ __('notification.message_credit') }} {{ $notificationItem->data['credit_quantity'] }}
                                                    <div class="small text-muted mt-1 d-flex align-items-center">
                                                        <i class="material-icons mr-1 font-size-sm">access_time</i>
                                                        @if (Carbon\Carbon::now()->diffInDays($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInDays($notificationItem->created_at) }} {{ __('notification.day') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInHours($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInHours($notificationItem->created_at) }} {{ __('notification.hour') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInMinutes($notificationItem->created_at) }} {{ __('notification.minute') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) >= 1)
                                                            <i>{{ Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) }} {{ __('notification.second') }}  {{ __('notification.ago') }}</i>
                                                        @elseif (Carbon\Carbon::now()->diffInSeconds($notificationItem->created_at) == 0)
                                                            <i>{{ __('notification.now') }}</i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif --}}
                                @endforeach
                                </div>
                            </div>
                            {{-- <div class="card-footer text-center">
                                <a href="javascript:void(0)">See all notifications &rsaquo;</a>
                            </div> --}}
                        </div>
                    @endauth
                </form>
            </div>
        </li>

        {{-- <script type="text/javascript">
            function updateReadAt(){
                {{ route('mark-as-read') }}
            }
        </script> --}}
 