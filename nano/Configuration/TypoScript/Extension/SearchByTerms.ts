lib.widgetSearchByTerms = CONTENT
lib.widgetSearchByTerms {
  table = tt_content
  select {
    pidInList = {$widget.searchByTerms.storagePid}
    where = uid={$widget.searchByTerms.contentUid}
  }
}