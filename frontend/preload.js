
const { contextBridge, ipcRenderer } = require('electron/renderer')

contextBridge.exposeInMainWorld('electronAPI', {
  loginPage: (callback) => ipcRenderer.on('loginPage', (_event, value) => callback(value)),
})