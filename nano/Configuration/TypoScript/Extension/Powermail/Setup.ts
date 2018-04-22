plugin.tx_powermail {
  view {
    templateRootPaths {
      0 = EXT:nano/Resources/Private/Templates/PowerMail/
      1 = EXT:powermail/Resources/Private/Templates/
    } = 
    partialRootPaths {
      0 = EXT:nano/Resources/Private/Partials/PowerMail/
      1 = EXT:powermail/Resources/Private/Partials/
    } 
    layoutRootPaths {
      0 = EXT:nano/Resources/Private/Layouts/PowerMail/
      1 = EXT:powermail/Resources/Private/Layouts
    }
  }
  
  settings.setup {
    validation {
      native = 1
      client = 1
      server = 1
    }
  }
}