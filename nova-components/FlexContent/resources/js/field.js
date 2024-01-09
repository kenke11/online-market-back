import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-flex-content', IndexField)
  app.component('detail-flex-content', DetailField)
  app.component('form-flex-content', FormField)
})
