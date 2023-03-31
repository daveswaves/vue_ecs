function setOrdering(column) {
   let ordering = "";

   if (column.order) {
      let operator = column.order === 'ascending' ? '' : '-'

      ordering = `&ordering=${operator}${column.prop}`
   }

   return main.$patch((state) =>
      state.ordering = ordering
   )
 }