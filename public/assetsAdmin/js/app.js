// random number for demo purpose
var randomNumber = (minus = false) => {
  const min = minus ? -100 : 10
  const max = 100
  return Math.floor(Math.random() * (max - min + 1) + min)
}

// Change sidebar theme
App.sidebarTheme = function () {
  if (document.querySelector('#sidebar-css')) {
    // apply sidebar theme
    function setSidebarTheme(src) {
      let logo = src.includes('white') ? 'logo.svg' : 'logo-white.svg'
      document.querySelector('#main-logo').src = '../img/' + logo
      document.querySelector('#sidebar-css').href = src
    }
    // watch changes
    for (const theme of document.querySelectorAll('input[name="sidebar-theme"]')) {
      theme.addEventListener('change', function () {
        setSidebarTheme(this.value)
        sessionStorage.setItem('sidebar-theme', this.value)
      })
    }
    // init from session
    if (sessionStorage.getItem('sidebar-theme')) {
      document.querySelector('input[name="sidebar-theme"][value="' + sessionStorage.getItem('sidebar-theme') + '"]').checked = true
      setSidebarTheme(sessionStorage.getItem('sidebar-theme'))
    }
  }
}

App.customFileInput()
App.dropdownHover()
App.backgroundCover()
App.customSpinner()
App.cardToolbar()
App.accordionActive()
App.navSection()
App.chat()
App.sidebarTheme()

if (document.querySelector('[autofocus]')) {
  document.querySelector('[autofocus]').focus()
}

// This is for development, attach breakpoint to document title
/* App.resize(() => {
  if (App.xs()) { document.title = 'xs' }
  if (App.sm()) { document.title = 'sm' }
  if (App.md()) { document.title = 'md' }
  if (App.lg()) { document.title = 'lg' }
  if (App.xl()) { document.title = 'xl' }
})() */

$(() => {
  $('[data-toggle="tooltip"]').tooltip()
  $('[data-toggle="popover"]').popover()
})