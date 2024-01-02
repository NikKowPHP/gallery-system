<?php
namespace Models;

use Models\Db_object;
use Models\Photo;

class QueryBuilder
{
	private string $table;
	private string $className;
	private array $joins = [];

	public function setTable($table): self
	{
		$this->table = $table;
		$this->className = $this->mapTableToClassName();
		return $this;
	}
	private function mapTableToClassName(): string
	{
		$formattedClassName ="Models\\". ucfirst(substr($this->table, 0, -1));

		return $formattedClassName;
	}


	/**
	 * @param string $relation - With which table it has relation
	 * @param string $relatedTable
	 * @param string $localKey - Local key of the second db
	 * @param string $foreignKey - 
	 * 
	 * @return self
	 */
	public function with(string $relation, string $relatedTable = null, string $localKey = null, string $foreignKey = null): self
	{
		$this->joins[$relation] = compact('relatedTable', 'localKey', 'foreignKey');
		return $this;
	}
	private function constructQuery(): string
	{
		$sql = "SELECT * FROM $this->table";
		foreach ($this->joins as $relation => $join) {
			$relatedTable = $join['relatedTable'];
			$localKey = $join['localKey'];
			$foreignKey = $join['foreignKey'];

			if ($relatedTable && $localKey && $foreignKey) {
				$sql .= " LEFT JOIN $relatedTable ON $this->table.$localKey = $relatedTable.$foreignKey";
			}
		}
		return $sql;
	}
	public function get(): array
	{
		$sql = $this->constructQuery();
		return $this->className::get_data_by_query($sql);

	}
}