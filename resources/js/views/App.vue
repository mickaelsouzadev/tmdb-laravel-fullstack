<template>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-lg-8 p-5">
				<div class="row justify-content-center">
					<div class="col-lg-6 d-flex flex-row">
						<select ref="selected" class="form-control">
							<option value=''>Select Genre</option>
							<option v-for="genre in genres" :key="genre.id" :value="genre.id" >{{ genre.name }}</option>
							
						</select>
						<button @click="getMoviesByGenre()" class="btn btn-rounded btn-info ml-2">Select</button>
					</div>
					<div class="col-lg-6 d-flex flex-row">
						<input type="text" placeholder="Search a Movie" class="form-control" @keyup.enter="getMoviesByName()" v-model="name"/>
						<button @click="getMoviesByName()" class="btn btn-rounded btn-info ml-2">Search</button>
					</div>
					
				</div>
				<!-- <div class="col-auto">
						
					</div> -->
			</div>	
		</div>
		
		
		<div class="row justify-content-center">
			<div class="col-lg-2 m-4" v-for="movie in orderedMovies" v-bind:key="movie.id">
				<div class="card" >
					<img class="card-top rounded shadow-4" :src="path_img+movie.poster_path">
					<div class="card-body justify-content-center">
				   	 	<h5 class="card-title info ml-2">{{ movie.title }}</h5>
				   	 	<button class="btn btn-rounded btn-info btn-block mt-3" @click="getMovieById(movie.id)">Details</button>
					</div>
				</div>
			</div>
			
			
				
			
		</div>
		
		<div v-if="modal">
		    <transition name="modal">
		      <div class="modal-mask">
		        <div class="modal-wrapper">
		          <div class="modal-dialog modal-lg" role="document">
		            <div class="modal-content">
		             
		              <!--   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true" @click="modal = false">&times;</span>
		                </button> -->
		             
		              <div class="modal-body d-flex flex-row justify-content-center">
		              
		              		<img :src="path_img+selected_movie.poster_path" width="250">
		              
		              	<div class="col-lg-12 p-3">
		              		<h4>{{ selected_movie.title }}</h4>
		              		<div class="pr-5">
		              			<p class="pr-5 mr-5">
		              				{{ selected_movie.overview }}
		              			</p>
		              			

		              		</div>
		              		<div class="pr-5 d-flex flex-row">
		              			<p>Genre(s): </p>
		              			<p class="pl-2" v-for="genger in selected_movie.genres">
		              				{{ genger.name }}
		              			</p>
		              		</div>	
		              		
		              		<button class="btn btn-rounded btn-info mt-3" @click="modal = false"> Close Details</button>
		              		
		              	</div>
		               
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </transition>
		  </div>

						
			</div>
	
	

</template>

<style type="text/css">
	body {
		background-color: #001233;
	}

	.card {
		background: none;
		color: #39c0ed;

	}

	.card-top {
		border-radius: 3%;
	}

	h5 {
		font-weight: 300;
	}

	.modal-mask {
	  position: fixed;
	  z-index: 9998;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  background-color: rgba(0, 0, 0, .5);
	  display: table;
	  transition: opacity .3s ease;
	}

	.modal-wrapper {
	  display: table-cell;
	  vertical-align: middle;
	}

	.modal-content {
		background-color: #001233;
		color: #39c0ed;
	}

	.modal-content p {
		font-size: 16px;
	}
</style>

<script>
export default {
  data() {
      return {
        movies: [],
        genres: [],
        name: '',
        path_img: 'https://image.tmdb.org/t/p/w300',
        modal: false,
        selected_movie: []

      }
  },
  methods: {
  	async getMovies() {
  		try {
  			const response = await axios.get('api/movie')
  			this.movies = response.data
 
  		} catch (error) {
  			console.error("Ocorreu um erro: ", error)
  		}
  		
  	},
  	async getGenres() {
  		try {
  			const response = await axios.get('api/genre')
  			this.genres = response.data

  		} catch (error) {
  			console.error("Ocorreu um erro: ", error)
  		}
  	},

  	async getMoviesByGenre() {
  		try {
  			const response = await axios.get(`api/movie/genre/${this.$refs.selected.value}`)
  			this.movies = response.data

  		} catch (error) {
  			console.error("Ocorreu um erro: ", error)
  		}
  	},

  	async getMoviesByName() {
  		try {
  			const response = await axios.get(`api/movie/name/${this.name}`)
  			console.log(this.name)
  			this.movies = response.data

  		} catch (error) {
  			console.error("Ocorreu um erro: ", error)
  		}
  	},

  	async getMovieById(id) {
  		try {
  			this.modal = true
  			const response = await axios.get(`api/movie/${id}`)

  	  		this.selected_movie = response.data
			
  		} catch (error) {
  			console.error("Ocorreu um erro: ", error)
  		}
  	}

  },
  mounted() {
  	this.getMovies()
  	this.getGenres()
  },
  computed: {
  	orderedMovies: function () {
    	return _.orderBy(this.movies, 'title')
  	}
  }
};
</script>