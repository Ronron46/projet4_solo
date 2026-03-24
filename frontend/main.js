const { app, BrowserWindow } = require('electron/main')
const { dialog, Menu, MenuItem } = require('electron/main')

const menu = new Menu()

const createWindow = () => {
  const win = new BrowserWindow({
    autoHideMenuBar: true,
    width: 800,
    height: 600,
    webPreferences: {
      preload:  '/home/maxime/cesi/projet4_solo/frontend/preload.js',
    }
  })

  const submenu = Menu.buildFromTemplate([
    {
      label: 'Open a Dialog',
      click: () => {win.webContents.send('loginPage', 1)},
      accelerator: 'CommandOrControl+Alt+R'
    }
  ])
  menu.append(new MenuItem({ label: 'Custom Menu', submenu }))
  Menu.setApplicationMenu(menu)

  win.loadFile('dist/index.html')
  //win.removeMenu()
  win.webContents.openDevTools()
}

app.whenReady().then(() => {
  createWindow()

  app.on('activate', () => {
    if (BrowserWindow.getAllWindows().length === 0) {
      createWindow()
    }
  })
})

app.on('window-all-closed', () => {
  if (process.platform !== 'darwin') {
    app.quit()
  }
})