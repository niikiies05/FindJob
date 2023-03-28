<li class="nav-item dropdown nav-notif">
            <a class="nav-link nav-icon has-badge dropdown-toggle no-caret text-white" onclick="updateReadAt();" href="#" data-toggle="dropdown"
                data-display="static">
                <i class="far fa-bell" style="font-size: 22px"></i>
                <span class="badge badge-pill badge-primary">
                    @auth
                        @php
                            $allNotifications = App\Models\Notification::whereIn('notifiable_type', ['App\Models\Message', 'App\Models\Contact', 'App\Models\Job'])
                            ->orderBy('created_at', 'DESC')
                            ->where('data->posteur', Auth::user()->id)
                            ->orWhere('data->user_id', Auth::user()->id)->get();

                            $countNotifications = App\Models\Notification::whereIn('notifiable_type', ['App\Models\Message', 'App\Models\Contact', 'App\Models\Job'])
                            ->orderBy('created_at', 'DESC')
                            ->whereNull('read_at')
                            ->where('data->posteur', Auth::user()->id)
                            ->orWhere('data->user_id', Auth::user()->id)->get();

                            echo $countNotifications->count();
                        @endphp
                    @endauth
                </span>
            </a>
            <div class="dropdown-menu shadow border-0 p-0" style="width: 400px">
                <form>
                    @auth
                        <div class="card border-0">
                            <div class="card-header bg-primary text-white">
                                <i class="far fa-bell mr-2" style="font-size: 22px"></i>

                                {{  $countNotifications->count() }} Notification(s)
                            </div>
                            <div class="card-body p-1 font-size-sm">
                                <div class="list-group list-group-sm list-group-flush">
                                @foreach ($allNotifications as $notificationItem)
                                
                                    @if ($notificationItem->type == 'App\Notifications\AddJob')
                                        <a href="{{ route('pending-ads') }}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <span class="bg-primary-faded text-primary btn-icon rounded-circle"><i class="fas fa-briefcase"></i></span>
                                                <div class="media-body ml-2">
                                                    Votre annonce {{ $notificationItem->data['job_title'] }} est en attente de validation
                                                    <div class="small text-muted mt-1 d-flex align-items-center">
                                                        <i class="far fa-clock mr-1 font-size-sm"></i>
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
                                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
                                        <div class="media">
                                            <span class="bg-warning-faded text-warning btn-icon rounded-circle"><i class="far fa-user"></i></span>
                                            <div class="media-body ml-2">
                                                Bienvenue {{ $notificationItem->data['user_name'] }} dans notre site
                                                <div class="small text-muted mt-1 d-flex align-items-center">
                                                    <i class="far fa-clock mr-1 font-size-sm"></i>
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
                                        <a href="{{ route('my-ads') }}" class="list-group-item list-group-item-action">
                                            <div class="media">
                                                <span class="bg-info-faded text-info btn-icon rounded-circle"><i class="fas fa-check"></i></span>
                                                <div class="media-body ml-2">
                                                    Your ads<br>
                                                    {{ $notificationItem->data['job_title'] }} <br>
                                                    <small>has been validated</small>
                                                    <div class="small text-muted mt-1 d-flex align-items-center">
                                                        <i class="far fa-clock mr-1 font-size-sm"></i>
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
 