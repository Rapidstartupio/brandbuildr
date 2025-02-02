<aside id="default-sidebar" class="left-0  w-30 h-full xl:h-screen" aria-label="Sidebar">
   <div class="h-full">
      <ul class="font-medium text-center">
         <li class="@if(Request::is('dashboard*')) active-dash-nav-item @else dash-nav-item @endif">
            <div class="dash-nav-link hidden">
               <a href="{{ route('wave.dashboard') }}" class="items-center text-gray-500 rounded-lg dark:text-gray-400 hover:text-white group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                     <path d="M19.5 5V7H15.5V5H19.5ZM9.5 5V11H5.5V5H9.5ZM19.5 13V19H15.5V13H19.5ZM9.5 17V19H5.5V17H9.5ZM21.5 3H13.5V9H21.5V3ZM11.5 3H3.5V13H11.5V3ZM21.5 11H13.5V21H21.5V11ZM11.5 15H3.5V21H11.5V15Z" fill="" />
                  </svg>
                  <span class="">Dashboard</span>
               </a>
            </div>
         </li>
         <li class="@if(Request::is('project*')) active-dash-nav-item @else dash-nav-item @endif">
            <div class="dash-nav-link">
               <a href="{{ route('projects.index') }}" class="items-center text-gray-500 rounded-lg dark:text-gray-400 hover:text-white group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                     <path d="M5.5 3C4.39 3 3.5 3.89 3.5 5V19C3.5 20.11 4.39 21 5.5 21H19.5C20.61 21 21.5 20.11 21.5 19V5C21.5 3.89 20.61 3 19.5 3H5.5ZM5.5 5H19.5V19H5.5V5ZM7.5 7V9H17.5V7H7.5ZM7.5 11V13H17.5V11H7.5ZM7.5 15V17H14.5V15H7.5Z" fill="" />
                  </svg>
                  <span class="">Projects</span>
               </a>
            </div>
         </li>
         <li class="@if(Request::is('settings/profile')) active-dash-nav-item @else dash-nav-item @endif">
            <div class="dash-nav-link">
               <!--<a href="#" class="items-center   text-gray-500 rounded-lg dark:text-gray-400 hover:text-white  group">-->
               <a href="{{ route('settings.profile') }}" class="items-center text-gray-500 rounded-lg dark:text-gray-400 hover:text-white group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                     <path d="M12.5 2C11.1868 2 9.88642 2.25866 8.67317 2.7612C7.45991 3.26375 6.35752 4.00035 5.42893 4.92893C3.55357 6.8043 2.5 9.34784 2.5 12C2.5 14.6522 3.55357 17.1957 5.42893 19.0711C6.35752 19.9997 7.45991 20.7362 8.67317 21.2388C9.88642 21.7413 11.1868 22 12.5 22C15.1522 22 17.6957 20.9464 19.5711 19.0711C21.4464 17.1957 22.5 14.6522 22.5 12C22.5 10.6868 22.2413 9.38642 21.7388 8.17317C21.2362 6.95991 20.4997 5.85752 19.5711 4.92893C18.6425 4.00035 17.5401 3.26375 16.3268 2.7612C15.1136 2.25866 13.8132 2 12.5 2ZM7.57 18.28C8 17.38 10.62 16.5 12.5 16.5C14.38 16.5 17 17.38 17.43 18.28C16.0294 19.396 14.2909 20.0026 12.5 20C10.64 20 8.93 19.36 7.57 18.28ZM18.86 16.83C17.43 15.09 13.96 14.5 12.5 14.5C11.04 14.5 7.57 15.09 6.14 16.83C5.07618 15.4446 4.49967 13.7467 4.5 12C4.5 7.59 8.09 4 12.5 4C16.91 4 20.5 7.59 20.5 12C20.5 13.82 19.88 15.5 18.86 16.83ZM12.5 6C10.56 6 9 7.56 9 9.5C9 11.44 10.56 13 12.5 13C14.44 13 16 11.44 16 9.5C16 7.56 14.44 6 12.5 6ZM12.5 11C12.1022 11 11.7206 10.842 11.4393 10.5607C11.158 10.2794 11 9.89782 11 9.5C11 9.10218 11.158 8.72064 11.4393 8.43934C11.7206 8.15804 12.1022 8 12.5 8C12.8978 8 13.2794 8.15804 13.5607 8.43934C13.842 8.72064 14 9.10218 14 9.5C14 9.89782 13.842 10.2794 13.5607 10.5607C13.2794 10.842 12.8978 11 12.5 11Z" fill="#79798E" />
                  </svg>
                  <span class="">Profile</span>
               </a>
            </div>
         </li>
         <li class="@if(Request::is('settings/profile')) dash-nav-item @elseif(Request::is('settings/*')) active-dash-nav-item @else dash-nav-item @endif">
            <div class="dash-nav-link">
               <!--<a href="{{ route('settings.profile') }}" class="items-center   text-gray-500 rounded-lg dark:text-gray-400 hover:text-white  group">-->
               <a href="{{ route('settings.white-label') }}" class="items-center text-gray-500 rounded-lg dark:text-gray-400 hover:text-white group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                     <path d="M12.4999 8C13.5608 8 14.5782 8.42143 15.3283 9.17157C16.0785 9.92172 16.4999 10.9391 16.4999 12C16.4999 13.0609 16.0785 14.0783 15.3283 14.8284C14.5782 15.5786 13.5608 16 12.4999 16C11.439 16 10.4216 15.5786 9.67147 14.8284C8.92132 14.0783 8.49989 13.0609 8.49989 12C8.49989 10.9391 8.92132 9.92172 9.67147 9.17157C10.4216 8.42143 11.439 8 12.4999 8ZM12.4999 10C11.9695 10 11.4608 10.2107 11.0857 10.5858C10.7106 10.9609 10.4999 11.4696 10.4999 12C10.4999 12.5304 10.7106 13.0391 11.0857 13.4142C11.4608 13.7893 11.9695 14 12.4999 14C13.0303 14 13.539 13.7893 13.9141 13.4142C14.2892 13.0391 14.4999 12.5304 14.4999 12C14.4999 11.4696 14.2892 10.9609 13.9141 10.5858C13.539 10.2107 13.0303 10 12.4999 10ZM10.4999 22C10.2499 22 10.0399 21.82 9.99989 21.58L9.62989 18.93C8.99989 18.68 8.45989 18.34 7.93989 17.94L5.44989 18.95C5.22989 19.03 4.95989 18.95 4.83989 18.73L2.83989 15.27C2.77869 15.167 2.75711 15.0452 2.7792 14.9274C2.80128 14.8096 2.86552 14.7039 2.95989 14.63L5.06989 12.97L4.99989 12L5.06989 11L2.95989 9.37C2.86552 9.29613 2.80128 9.19042 2.7792 9.07263C2.75711 8.95484 2.77869 8.83304 2.83989 8.73L4.83989 5.27C4.95989 5.05 5.22989 4.96 5.44989 5.05L7.93989 6.05C8.45989 5.66 8.99989 5.32 9.62989 5.07L9.99989 2.42C10.0399 2.18 10.2499 2 10.4999 2H14.4999C14.7499 2 14.9599 2.18 14.9999 2.42L15.3699 5.07C15.9999 5.32 16.5399 5.66 17.0599 6.05L19.5499 5.05C19.7699 4.96 20.0399 5.05 20.1599 5.27L22.1599 8.73C22.2899 8.95 22.2299 9.22 22.0399 9.37L19.9299 11L19.9999 12L19.9299 13L22.0399 14.63C22.2299 14.78 22.2899 15.05 22.1599 15.27L20.1599 18.73C20.0399 18.95 19.7699 19.04 19.5499 18.95L17.0599 17.95C16.5399 18.34 15.9999 18.68 15.3699 18.93L14.9999 21.58C14.9599 21.82 14.7499 22 14.4999 22H10.4999ZM11.7499 4L11.3799 6.61C10.1799 6.86 9.11989 7.5 8.34989 8.39L5.93989 7.35L5.18989 8.65L7.29989 10.2C6.89989 11.3667 6.89989 12.6333 7.29989 13.8L5.17989 15.36L5.92989 16.66L8.35989 15.62C9.12989 16.5 10.1799 17.14 11.3699 17.38L11.7399 20H13.2599L13.6299 17.39C14.8199 17.14 15.8699 16.5 16.6399 15.62L19.0699 16.66L19.8199 15.36L17.6999 13.81C18.0999 12.64 18.0999 11.37 17.6999 10.2L19.8099 8.65L19.0599 7.35L16.6499 8.39C15.8641 7.48032 14.7982 6.85767 13.6199 6.62L13.2499 4H11.7499Z" fill="#79798E" />
                  </svg>
                  <span class="">Settings</span>
               </a>
            </div>
         </li>
         <li class="dash-nav-item">
            <div class="dash-nav-link">
               <a href="#" class="items-center text-gray-500 rounded-lg dark:text-gray-400 hover:text-white group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                     <path d="M4.5 2C3.96957 2 3.46086 2.21071 3.08579 2.58579C2.71071 2.96086 2.5 3.46957 2.5 4V16C2.5 16.5304 2.71071 17.0391 3.08579 17.4142C3.46086 17.7893 3.96957 18 4.5 18H8.5V21C8.5 21.2652 8.60536 21.5196 8.79289 21.7071C8.98043 21.8946 9.23478 22 9.5 22H10C10.25 22 10.5 21.9 10.7 21.71L14.4 18H20.5C21.0304 18 21.5391 17.7893 21.9142 17.4142C22.2893 17.0391 22.5 16.5304 22.5 16V4C22.5 3.46957 22.2893 2.96086 21.9142 2.58579C21.5391 2.21071 21.0304 2 20.5 2H4.5ZM4.5 4H20.5V16H13.58L10.5 19.08V16H4.5V4ZM12.69 5.5C11.8 5.5 11.09 5.68 10.55 6.04C10 6.4 9.72 7 9.77 7.69H11.74C11.74 7.41 11.84 7.2 12 7.06C12.2 6.92 12.42 6.85 12.69 6.85C13 6.85 13.27 6.93 13.45 7.11C13.63 7.28 13.72 7.5 13.72 7.8C13.72 8.08 13.64 8.33 13.5 8.54C13.33 8.76 13.12 8.94 12.86 9.08C12.34 9.4 12 9.68 11.79 9.92C11.6 10.16 11.5 10.5 11.5 11H13.5C13.5 10.72 13.55 10.5 13.64 10.32C13.73 10.15 13.9 10 14.16 9.85C14.62 9.64 15 9.36 15.29 9C15.58 8.63 15.73 8.24 15.73 7.8C15.73 7.1 15.46 6.54 14.92 6.12C14.38 5.71 13.63 5.5 12.69 5.5ZM11.5 12V14H13.5V12H11.5Z" fill="#79798E" />
                  </svg>
                  <span class="">Support</span>
               </a>
            </div>
         </li>
         <li class="dash-nav-item">
            <div class="dash-nav-link">
               <a href="javascript:;" onclick="hideAside()" class="items-center text-gray-500 rounded-lg dark:text-gray-400 hover:text-white group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                     <path d="M15.91 16.58L11.33 12L15.91 7.41L14.5 6L8.5 12L14.5 18L15.91 16.58Z" fill="#79798E" />
                  </svg>
                  <span class="">Hide</span>
               </a>
            </div>
         </li>
         <li class="dash-nav-item">
            <div class="dash-nav-link">
               <a href="/logout" class="items-center text-gray-500 rounded-lg dark:text-gray-400 hover:text-white group">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                     <path d="M17.5 8L16.1 9.4L17.7 11H9.5V13H17.7L16.1 14.6L17.5 16L21.5 12L17.5 8ZM5.5 5H12.5V3H5.5C4.4 3 3.5 3.9 3.5 5V19C3.5 20.1 4.4 21 5.5 21H12.5V19H5.5V5Z" fill="#79798E" />
                  </svg>
                  <span class="">Log Out</span>
               </a>
            </div>
         </li>
      </ul>
   </div>
</aside>
