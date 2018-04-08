lib.widgetSearchByVehical = CONTENT
lib.widgetSearchByVehical {
  table = tt_content
  select {
    pidInList = {$widget.searchByTerms.storagePid}
    where = uid={$widget.searchByTerms.contentUid}
  }
}