import { ElMessage } from 'element-plus'
import { defineStore } from 'pinia'
import error from '@/utils/error'


const useMain = defineStore('main', {
   state: () => ({
      orders: [],
      currentPage: 1,
      maxPage: 0,
      ordering: '',
   }),
   actions: {
      buildRequest(type, args) {
         request
            .get(`${type}/?page=${this.currentPage}${args}${this.ordering}`)
            .then((res) => {
               this.maxPage = res.data.total_pages;
               this.orders = res.data.results;
            })
            .catch((err) => error(err))
      },
      incPage() {
         if (this.maxPage !== this.currentPage) {
            this.currentPage++;
         }
      },
      decPage() {
         if (this.currentPage !== 1) {
            this.currentPage--;
         }
      },
      resetPage() {
         this.currentPage = 1;
      }
   }
})