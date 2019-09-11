<?php 

  /**
   * Methods
   */
  interface Methods {
    /**
     * Create a object to persist it
     * 
     * @param null
     * @return Array
     */
    public function create();
    
    /**
     * Read a persisted object
     * 
     * @param null
     * @return Array
     */
    public function read();
    
    /**
     * Update a persisted object
     * 
     * @param Integer $id
     * @return Array
     */
    public function update($id);
    
    /**
     * Delete an existing object
     * 
     * @param Integer $id
     * @return Array
     */
    public function delete($id);

  }

?>