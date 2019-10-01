<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar  open ">
	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">

		<a href="{{route('en.home.index')}}" class="logo">
			<div class="img-wrap">
				<img src="{{asset('') . logo()->link}}" alt="Olympus">
			</div>
		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<ul class="left-menu">
				<li>
					<a href="#" class="js-sidebar-open">
						<svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="OPEN MENU"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="{{route('en.home.index')}}">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="16-FavPagesFeed.html">
						<svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="17-FriendGroups.html">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FRIEND GROUPS"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="18-MusicAndPlaylists.html">
						<svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="MUSIC&PLAYLISTS"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="19-WeatherWidget.html">
						<svg class="olymp-weather-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="WEATHER APP"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-weather-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="20-CalendarAndEvents-MonthlyCalendar.html">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CALENDAR AND EVENTS"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="{{route('en.coordinator.badges.index')}}">
						<svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Community Badges"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-badge-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="25-FriendsBirthday.html">
						<svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Friends Birthdays"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-cupcake-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="26-Statistics.html">
						<svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Account Stats"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-stats-icon"></use></svg>
					</a>
				</li>
				<li>
					<a href="27-ManageWidgets.html">
						<svg class="olymp-manage-widgets-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Manage Widgets"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon"></use></svg>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
        <a href="{{route('en.home.index')}}" class="logo">
			<div class="img-wrap">
				<img src="{{asset('') . logo()->link}}" alt="Olympus">
			</div>

		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<ul class="left-menu">
				<li>
                    <a href="{{route('en.profile.index')}}">
						<div class="author-thumb left-menu-icon" style="width: 20px; height:20px;" >
							<img alt="author" src="{{asset('') . Auth::user()->image}}" class="avatar">
						</div>
						<span class="left-menu-title">My Profile</span>
					</a>
				</li>
				<li>
					<a href="{{route('en.home.index')}}">
						<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
						<span class="left-menu-title">Newsfeed</span>
					</a>
				</li>
				<li>
						<a href="18-MusicAndPlaylists.html">
							<svg class="olymp-happy-face-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="MUSIC&PLAYLISTS"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
							<span class="left-menu-title">Followers</span>
						</a>
					</li>

				{{-- <li>
					<a href="16-FavPagesFeed.html">

							<svg class="olymp-computer-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Manage Widgets"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
							<span class="left-menu-title">Courses</span>
					</a>
				</li> --}}
				<li>
					<a href="20-CalendarAndEvents-MonthlyCalendar.html">
						<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CALENDAR AND EVENTS"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
						<span class="left-menu-title">Calendar</span>
					</a>
				</li>
				<li>
					<a href="17-FriendGroups.html">
						<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FRIEND GROUPS"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use></svg>
						<span class="left-menu-title">Groups</span>
					</a>
				</li>



				<li>
					<a href="{{route('en.coordinator.badges.index')}}">
						<svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Community Badges"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-badge-icon"></use></svg>
						<span class="left-menu-title">Community Badges</span>
					</a>
				</li>

				<li>
					<a href="26-Statistics.html">
						<svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Account Stats"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-stats-icon"></use></svg>
						<span class="left-menu-title">Account Stats</span>
					</a>
				</li>

			</ul>

			<div class="ui-block-title ui-block-title-small">
					<h6 class="title">YOUR ACCOUNT</h6>
				</div>

				<ul class="account-settings">
					<li>
						<a href="{{route('en.profile.personal_info')}}">

							<svg class="olymp-menu-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>

							<span>Profile Settings</span>
						</a>
					</li>
					<li>
                        @role('coordinator')
                            <a href="{{route('en.coordinator.courses.index')}}">
                        @elseif('employee')
                            <a href="{{route('en.employee.courses.index')}}">
                        @endrole

                            <svg class="olymp-happy-sticker-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>

                            <span>My Courses</span>
                        </a>
                    </li>
						<li>
                                @role('coordinator')
                                    <a href="{{route('en.coordinator.classrooms.index')}}">
                                @elseif('employee')
                                    <a href="{{route('en.employee.classrooms.index')}}">
                                @endrole

									<svg class="olymp-albums-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-albums-icon"></use></svg>

									<span>My Classrooms</span>
								</a>
							</li>

					<li>
						<a href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('en.auth.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
							<svg class="olymp-logout-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

							<span>Log Out</span>
						</a>
					</li>
				</ul>




		</div>
	</div>
</div>

<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Left -->

<div class="fixed-sidebar fixed-sidebar-responsive">

	<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
		<a href="#" class="logo js-sidebar-open">
			<img src="{{asset('') . logo()->link}}" alt="Olympus">
		</a>

	</div>

	<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
		<a href="#" class="logo">
			<div class="img-wrap">
				<img src="{{asset('') . logo()->link}}" alt="Olympus">
			</div>

		</a>

		<div class="mCustomScrollbar" data-mcs-theme="dark">

			<div class="control-block">
				<div class="author-page author vcard inline-items">
					<div class="author-thumb">
						<img alt="author" src="{{asset('assets/')}}/img/author-page.jpg" class="avatar">
						<span class="icon-status online"></span>
					</div>
					<a href="02-ProfilePage.html" class="author-name fn">
						<div class="author-title">
							James Spiegel <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
						</div>
						<span class="author-subtitle">SPACE COWBOY</span>
					</a>
				</div>
			</div>

			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">MAIN SECTIONS</h6>
			</div>
			<ul class="left-menu">
					<li>
						<a href="#" class="js-sidebar-open">
							<svg class="olymp-close-icon left-menu-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
							<span class="left-menu-title">Collapse Menu</span>
						</a>
					</li>
					<li>
						<a href="{{route('en.home.index')}}">
							<svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
							<span class="left-menu-title">Newsfeed</span>
						</a>
					</li>
					<li>
							<a href="18-MusicAndPlaylists.html">
								<svg class="olymp-happy-face-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="MUSIC&PLAYLISTS"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
								<span class="left-menu-title">Followers</span>
							</a>
						</li>

					{{-- <li>
						<a href="16-FavPagesFeed.html">

								<svg class="olymp-computer-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Manage Widgets"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
								<span class="left-menu-title">Courses</span>
						</a>
					</li> --}}
					<li>
						<a href="20-CalendarAndEvents-MonthlyCalendar.html">
							<svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CALENDAR AND EVENTS"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
							<span class="left-menu-title">Calendar</span>
						</a>
					</li>
					<li>
						<a href="17-FriendGroups.html">
							<svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FRIEND GROUPS"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use></svg>
							<span class="left-menu-title">Groups</span>
						</a>
					</li>



					<li>
						<a href="{{route('en.coordinator.badges.index')}}">
							<svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Community Badges"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-badge-icon"></use></svg>
							<span class="left-menu-title">Community Badges</span>
						</a>
					</li>

					<li>
						<a href="26-Statistics.html">
							<svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Account Stats"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-stats-icon"></use></svg>
							<span class="left-menu-title">Account Stats</span>
						</a>
					</li>

				</ul>


			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">YOUR ACCOUNT</h6>
			</div>

			<ul class="account-settings">
				<li>
					<a href="{{route('en.profile.personal_info')}}">

						<svg class="olymp-menu-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>

						<span>Profile Settings</span>
					</a>
                </li>

				<li>

                    @role('coordinator')
                        <a href="{{route('en.coordinator.courses.index')}}">
                    @elseif('employee')
                        <a href="{{route('en.employee.courses.index')}}">
                    @endrole

                        <svg class="olymp-happy-sticker-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>

                        <span>My Courses</span>
                    </a>
                </li>

                <li>
                    <a href="#">

                        <svg class="olymp-albums-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-albums-icon"></use></svg>

                        <span>My ClassRooms</span>
                    </a>
                </li>

				<li>
					<a href="#">
						<svg class="olymp-logout-icon"><use xlink:href="{{asset('assets/')}}/svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

						<span>Log Out</span>
					</a>
                </li>

			</ul>



		</div>
	</div>
</div>

<!-- ... end Fixed Sidebar Left -->
