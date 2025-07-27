"use client"

import * as React from "react";
import { router } from "@inertiajs/react";
import  useMediaQuery from "@/hooks/use-media-query";

import { Button } from "@/components/ui/button";
import { Switch } from "@/components/ui/switch";
import ConditionsBuilder from "@/components/ui/conditions-builder";
import {
  Dialog, DialogContent, DialogDescription, DialogHeader,
  DialogTitle, DialogTrigger,
} from "@/components/ui/dialog";
import {
  Drawer, DrawerClose, DrawerContent, DrawerDescription,
  DrawerFooter, DrawerHeader, DrawerTitle, DrawerTrigger,
} from "@/components/ui/drawer";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { Label } from "@/components/ui/label";
import { Select, SelectTrigger, SelectContent, SelectItem, SelectValue } from "@/components/ui/select";

export function CreateGameRuleModal() {
  const [open, setOpen] = React.useState(false)
  const [key, setKey] = React.useState("")
  const [description, setDescription] = React.useState("")
  const [context, setContext] = React.useState("")
  const [points, setPoints] = React.useState("")
  const [conditions, setConditions] = React.useState([])
  const [active, setActive] = React.useState(false)
  const isDesktop = useMediaQuery("(min-width: 768px)")


  const contexts = [
    'result_points',
    'score_points',
    'goalscorer_points',
    'trophy_points'
  ];

  const handleConditionsChange = (conds: any) => {
    console.log("New Conditions JSON:", conds)
    // Save via Inertia POST/PATCH or form context
  }

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()

    router.post("/admin/settings/rules", { key }, {
      onSuccess: () => {
        setOpen(false)
        setKey("")
        setDescription("")
        setContext("")
        // Optionally redirect to edit page if backend returns `user.id`
        // router.visit(`/users/${newUserId}/edit`)
      },
    })
  }

  const Form = (
    <form onSubmit={handleSubmit} className="grid items-start gap-6 px-4">
      <div className="grid gap-3">
        <Label htmlFor="name">Key</Label>
        <Input
          id="key"
          value={key}
          onChange={(e) => setKey(e.target.value)}
          required
        />
      </div>
      <div className="grid gap-3">
        <Label htmlFor="name">Type</Label>
        <Select id="type"
        value={context || ""}
        onValueChange={(value) => {
            setContext(value)
        }}
        >
        <SelectTrigger className="w-[200px]">
            <SelectValue placeholder="Select context" />
            </SelectTrigger>
            <SelectContent>
            {contexts.map((context, id) => (
                <SelectItem key={id} value={context}>
                {context}
                </SelectItem>
            ))}
            </SelectContent>
        </Select>
      </div>
      <div className="grid gap-3">
        <Label htmlFor="description">Description</Label>
        <Textarea
          id="description"
          value={description}
          onChange={(e) => setDescription(e.target.value)}
          required
        />
      </div>   

      <div className="grid gap-3">
        <Label htmlFor="points">Points</Label>
        <Input
          id="points"
          value={points}
          onChange={(e) => setPoints(e.target.value)}
          required
        />
      </div> 

      <div className="grid gap-3">
        <Label htmlFor="conditions">Condtions</Label>
          <ConditionsBuilder onChange={handleConditionsChange} />
      </div>       

      <div className="grid gap-3">
        <Label htmlFor="active">Active</Label>

        <Switch
            checked={active}
            onCheckedChange={(e) => setActive(!active)}
          />
      </div>            
      <Button type="submit">Create</Button>
    </form>
  )

  if (isDesktop) {
    return (
      <Dialog open={open} onOpenChange={setOpen}>
        <DialogTrigger asChild>
          <Button>Create Rule</Button>
        </DialogTrigger>
        <DialogContent className="sm:max-w-[425px]">
          <DialogHeader>
            <DialogTitle>Create Rule</DialogTitle>
            <DialogDescription>
              Enter the rule details
            </DialogDescription>
          </DialogHeader>
          {Form}
        </DialogContent>
      </Dialog>
    )
  }

  return (
    <Drawer open={open} onOpenChange={setOpen}>
      <DrawerTrigger asChild>
        <Button>Create Rule</Button>
      </DrawerTrigger>
      <DrawerContent>
        <DrawerHeader className="text-left">
          <DrawerTitle>Create Rule</DrawerTitle>
          <DrawerDescription>
            Enter the rule details
          </DrawerDescription>
        </DrawerHeader>
        {Form}
        <DrawerFooter>
          <DrawerClose asChild>
            <Button variant="outline">Cancel</Button>
          </DrawerClose>
        </DrawerFooter>
      </DrawerContent>
    </Drawer>
  )
}