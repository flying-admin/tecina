const { app, BrowserWindow } = require('electron')

let win;

function createWindow () {
  // Create the browser window.
  win = new BrowserWindow({
    width: 1920, 
    height: 1080,
    minimizable: false,
    backgroundColor: '#141414',
    icon: `file://${__dirname}/dist/assets/icono_tasca.icns`
  })


  win.loadURL(`file://${__dirname}/dist/index.html`)

  win.maximize();
  //win.setFullScreen(true);

  //// uncomment below to open the DevTools.
  // win.webContents.openDevTools()

  // Event when the window is closed.
  win.on('closed', function () {
    win = null
  })
}

// Create window on electron intialization
app.on('ready', createWindow)

// Quit when all windows are closed.
app.on('window-all-closed', function () {

  // On macOS specific close process
  if (process.platform !== 'darwin') {
    app.quit()
  }
})

app.on('activate', function () {
  // macOS specific close process
  if (win === null) {
    createWindow();
  }
})