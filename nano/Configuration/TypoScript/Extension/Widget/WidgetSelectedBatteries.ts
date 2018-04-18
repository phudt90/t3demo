plugin.tx_nano_widgetselectedbatteries {
  view {
    templateRootPaths.0 = EXT:nano/Resources/Private/Templates/Page/
    partialRootPaths.0 = EXT:nano/Resources/Private/Partials/Page/
    layoutRootPaths.0 = EXT:nano/Resources/Private/Layouts/Page/
  }
  
  settings {
    cartPid = {$plugin.cartPid}
    detailsPid = {$plugin.detailsPid}
  }
}