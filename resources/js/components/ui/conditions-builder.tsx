import { useState } from "react"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Select, SelectTrigger, SelectValue, SelectContent, SelectItem } from "@/components/ui/select"
import { Card, CardContent } from "@/components/ui/card"

type Condition = {
  field: string
  operator: string
  value: string | number
}

type ConditionsBuilderProps = {
  value: any[];
  onChange: (conditions: any[]) => void;
};

const availableFields = [
  { key: "home_goals", label: "Home Goals" },
  { key: "away_goals", label: "Away Goals" },
  { key: "goal_difference", label: "Goal Difference" },
  { key: "home_team", label: "Home Team" },
  { key: "away_team", label: "Away Team" }
]

const operators = [
  { key: "=", label: "=" },
  { key: ">=", label: ">=" },
  { key: "<=", label: "<=" },
  { key: "!=", label: "!=" }
]

export default function ConditionsBuilder({
  defaultConditions = [],
  onChange
}: {
  defaultConditions?: Condition[]
  onChange?: (conditions: Condition[]) => void
}) {
  const [conditions, setConditions] = useState<Condition[]>(defaultConditions)

  const updateCondition = (index: number, key: keyof Condition, value: string) => {
    const updated = [...conditions]
    updated[index] = { ...updated[index], [key]: value }
    setConditions(updated)
    onChange?.(updated)
  }

  const addCondition = () => {
    const updated = [...conditions, { field: "", operator: "=", value: "" }]
    setConditions(updated)
    onChange?.(updated)
  }

  const removeCondition = (index: number) => {
    const updated = conditions.filter((_, i) => i !== index)
    setConditions(updated)
    onChange?.(updated)
  }

  return (
    <Card>
      <CardContent className="space-y-3">
        {conditions.map((condition, i) => (
          <div key={i} className="flex gap-2 items-center">
            {/* FIELD SELECT */}
            <Select
              value={condition.field}
              onValueChange={(val) => updateCondition(i, "field", val)}
            >
              <SelectTrigger className="w-[150px]">
                <SelectValue placeholder="Field" />
              </SelectTrigger>
              <SelectContent>
                {availableFields.map((f) => (
                  <SelectItem key={f.key} value={f.key}>
                    {f.label}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>

            {/* OPERATOR SELECT */}
            <Select
              value={condition.operator}
              onValueChange={(val) => updateCondition(i, "operator", val)}
            >
              <SelectTrigger className="w-[80px]">
                <SelectValue placeholder="Op" />
              </SelectTrigger>
              <SelectContent>
                {operators.map((o) => (
                  <SelectItem key={o.key} value={o.key}>
                    {o.label}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>

            {/* VALUE INPUT */}
            <Input
              className="w-[100px]"
              value={String(condition.value)}
              onChange={(e) => updateCondition(i, "value", e.target.value)}
            />

            {/* REMOVE BUTTON */}
            <Button variant="destructive" size="sm" onClick={() => removeCondition(i)}>
              Remove
            </Button>
          </div>
        ))}

        <Button onClick={addCondition} size="sm" variant="secondary">
          + Add Condition
        </Button>
      </CardContent>
    </Card>
  )
}