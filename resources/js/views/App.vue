<template>
	<div class="container-fluid">
		<div class="row justify-content-center p-5">
			<div class="col-lg-4 m-5">
				<select ref="selected" class="form-control">
					<option value=''>Select Genre</option>
					<option v-for="genre in genres" :key="genre.id" :value="genre.id" >{{ genre.name }}</option>
				</select>
				<button @click="getMoviesByGenre" class="btn btn-red ml-5">Select</button>
			</div>	
			<div class="col-lg-4 m-5">
				<input type="text" class="form-control" @keyup.enter="getMoviesByName()" placeholder="Search Your Movie" v-model="name">
			</div>				
		</div>
		
		<div class="row justify-content-center">
			<div class="col-lg-2 m-4" v-for="movie in orderedMovies" v-bind:key="movie.id">
				<div class="card shadow-0" >
				<img class="card-top" :src="path_img+movie.poster_path">
					<div class="card-body">
				   	 	<h5 class="card-title">{{ movie.title }}</h5>
					</div>
				</div>
			</div>
			
			
				
			
		</div>
		
				

				
	</div>
	
	

</template>

<style type="text/css">
	body {
		background-color: #003049;
	}

	.card {
		background: none;
		color: #d62828;
	}

	.btn-red {
		background-color: #d62828;
		color: #fff;
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